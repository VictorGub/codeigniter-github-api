<!-- Content -->
<ul id="breadcrumbs">
    <li><a href="<?=base_url();?>" class="current">Home</a></li>
</ul>
<div class="container">
    <div class="row top">
        <div class="span9 welcome-text">
            <div class="welcome-text">
                <?php if (!$this->github->get_access_token()){ ?>
                <?php echo anchor('authorize', '<i class="icon-github icon-spin"></i> Login with GitHub', array('class' => 'btn btn-block', 'id' => 'login-button')); ?>
                <?php }else{ ?>
                    <h1><?=$repos->full_name;?></h1>
                    <p>Description: <?=$repos->description;?></p>
                    <p>Watchers: <?=$repos->watchers;?></p>
                    <p>Forks: <?=$repos->forks;?></p>
                    <p>Open issues: <?=$repos->open_issues;?></p>
                    <p>Homepage: <?=$repos->homepage ? anchor($repos->homepage, $repos->homepage, 'target="_blank"') : '';?></p>
                    <p>GitHub repo: <?=$repos->html_url ? anchor($repos->html_url, $repos->html_url, 'target="_blank"') : '';?></p>
                    <p>Created at: <?=$repos->created_at;?></p>
                    <p>Updated at: <?=$repos->updated_at;?></p>
                <?php } ?>
            </div>
        </div>

        <div class="span3">
            <?php if ($this->github->get_access_token()){ ?>
            <h3>Contributors:</h3>
                <table>
            <?php
                for($i=0;$i<7;$i++){
                    if(!empty($contributors[$i])){
                    echo '<tr><td style="width: 130px;">'.anchor(base_url().'user/'.$contributors[$i]->login, $contributors[$i]->login).'</td>';

                    $like_flag = FALSE;
                    foreach($user_likes->result() as $like){
                        if($like->users_like_id == $contributors[$i]->id){
                            $like_flag = TRUE;
                        }
                    }
                    echo '<td>';
                    echo $like_flag ? '<div id="answ'.$contributors[$i]->id.'"><button class="dislike" onclick="send('.$contributors[$i]->id.');"></button></div>' : '<div id="answ'.$contributors[$i]->id.'"><button class="like" onclick="send('.$contributors[$i]->id.');"></button></div>';
                    ?>
                    </td></tr>
                    <?php
                    }
                }
            }
            ?>
            </table>
        </div>
    </div>