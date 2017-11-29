<?php
namespace app\home\controller;
use think\Db;
use think\Request;
use app\home\model\Document;
/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class Article extends Home {

    /* 文档模型频道页 */
	public function index(){
		/* 分类信息 */
		$category = $this->category();

		//频道页只显示模板，默认不读取任何内容
		//内容可以通过模板标签自行定制

		/* 模板赋值并渲染模板 */
		$this->assign('category', $category);
		return $this->fetch($category['template_index']);
	}

	/* 文档模型列表页 */
	public function lists($p = 1){
		/* 分类信息 */
		$category = $this->category();
		/* 获取当前分类列表 */
		$Document = new Document();
		$list = Db::table("document")->where("status","=",1)->where("category_id","=",$category["id"])->paginate(3);
		if(false === $list){
			$this->error('获取列表数据失败！');
		}
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
		/* 模板赋值并渲染模板 */
		$this->assign('category', $category);
        $this->assign('channel',$channel);
		$this->assign('informList', $list);
		return $this->fetch($category['template_lists']);
	}
	/* 文档模型详情页 */
	public function detail($id = 0, $p = 1){
		/* 标识正确性检测 */
		if(!($id && is_numeric($id))){
			$this->error('文档ID错误！');
		}

		/* 页码检测 */
		$p = intval($p);
		$p = empty($p) ? 1 : $p;

		/* 获取详细信息 */
		$Document = new Document();
		$info = $Document->detail($id);
		if(!$info){
			$this->error($Document->getError());
		}
		/* 分类信息 */
		$category = $this->category($info['category_id']);
		/* 获取模板 */
		if(!empty($info['template'])){//已定制模板
			$tmpl = $info['template'];
		} elseif (!empty($category['template_detail'])){ //分类已定制模板
			$tmpl = $category['template_detail'];
		} else { //使用默认模板
			$tmpl = 'article/'. get_document_model($info['model_id'],'name') .'/detail';
		}
		/* 更新浏览数 */
		$map = array('id' => $id);
		$Document->where($map)->setInc('view');
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>判断用户是否参与该活动
        $member_id = is_login();
        $model = Db::table("member_article")->where("member_id","=",$member_id)->where("article_id","=",$info["id"])->find();
		//>>判断该活动是否过期
        $deadline = $info["deadline"];
        if (time()>$deadline){
            $overdue = "yes";
        }else{
            $overdue = "no";
        }
        /* 模板赋值并渲染模板 */
        $this->assign('channel',$channel);
		$this->assign('category', $category);
		$this->assign('inform', $info);
		$this->assign('page', $p); //页码
		$this->assign('model', $model);
		$this->assign('overdue', $overdue);
		return $this->fetch($tmpl);
	}

	/* 文档分类检测 */
	private function category($id = 0){
		/* 标识正确性检测 */
		$id = $id ? $id : input('param.category',0);
		if(empty($id)){
			$this->error('没有指定文档分类！');
		}
		/* 获取分类信息 */
		$category = model('Category')->info($id);
		if($category && 1 == $category['status']){
			switch ($category['display']) {
				case 0:
					$this->error('该分类禁止显示！');
					break;
				//TODO: 更多分类显示状态判断
				default:
					return $category;
			}
		} else {
			$this->error('分类不存在或被禁用！');
		}
	}
}
