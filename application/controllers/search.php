<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!$this->github->user()){
            redirect(base_url());
        }
	}

	public function index()
	{
        $search=$this->input->post("search");
        //die($search.' - '.empty($search));
        if($search){
            redirect(base_url().'search/'.$search);
        }else{
            redirect(base_url());
        }
	}

    public function search_repo($name='yii')
    {
        $this->head['title']="GitHub API - search - ".rawurldecode($name);

        $user=$this->github->user();
        $this->data['user_likes'] = $this->db->from('respo_like')
            ->where('id_user', $user->id)
            ->get();

        $this->data['name']=rawurldecode($name);
        $this->data['repos']=$this->github->search_repo($name);

        // Подключение отображений
        $this->load->view('templates/header', $this->head);
        $this->load->view('search', $this->data);
        $this->load->view('templates/footer');
    }

    public function like()
    {
        $user=$this->github->user();
        $id=$this->input->post('id');

        $like = $this->db->from('respo_like')
            ->where('id_user', $user->id)
            ->where('id_respo',$id)
            ->get();

        //если записи нет
        if($like->num_rows()<1){
            //вставляем её и отображаем Дизлайк
            $data = array(
                'id_user' => $user->id,
                'id_respo' => $id
            );
            $this->db->insert('respo_like', $data);

            echo '<button class="dislike" onclick="like_repo('.$id.');"></button>';
        }else{
            //запись есть - удаляем её и показываем Лайк
            $this->db->delete('respo_like', array('id' => $like->row()->id));
            echo '<button class="like" onclick="like_repo('.$id.');"></button>';
        }
    }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */