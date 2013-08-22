<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $this->head['title']="GitHub API";

        $this->data['user']=$this->github->user();

        if($this->data['user']){
            $this->data['user_likes'] = $this->db->from('users_like')
                ->where('id_user', $this->data['user']->id)
                ->get();
        }

        $this->data['repos']=$this->github->get_repository('yiisoft','yii');
        $this->data['contributors']=$this->github->list_contributors('yiisoft','yii');
        //$this->date['content']=$this->github->repositories();

        // Подключение отображений
        $this->load->view('templates/header', $this->head);
        $this->load->view('content', $this->data);
        $this->load->view('templates/footer');
	}

    public function repos($owner='yiisoft',$repo='yii')
    {
        $this->head['title']="GitHub API - repos - ".$owner.'/'.$repo;

        $this->data['user']=$this->github->user();

        $this->data['user_likes'] = $this->db->from('users_like')
            ->where('id_user', $this->data['user']->id)
            ->get();

        $this->data['repos']=$this->github->get_repository($owner,$repo);
        $this->data['contributors']=$this->github->list_contributors($owner,$repo);

        // Подключение отображений
        $this->load->view('templates/header', $this->head);
        $this->load->view('content', $this->data);
        $this->load->view('templates/footer');
    }

    public function like()
    {
        $user=$this->github->user();
        $id=$this->input->post('id');

        $like = $this->db->from('users_like')
            ->where('id_user', $user->id)
            ->where('users_like_id',$id)
            ->get();

        //если записи нет
        if($like->num_rows()<1){
            //вставляем её и отображаем Дизлайк
            $data = array(
                'id_user' => $user->id,
                'users_like_id' => $id
            );
            $this->db->insert('users_like', $data);

            echo '<button class="dislike" onclick="send('.$id.');"></button>';
        }else{
            //запись есть - удаляем её и показываем Лайк
            $this->db->delete('users_like', array('id' => $like->row()->id));
            echo '<button class="like" onclick="send('.$id.');"></button>';
        }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */