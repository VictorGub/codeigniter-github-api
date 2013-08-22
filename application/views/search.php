<!-- Content -->
<ul id="breadcrumbs">
    <li><a href="<?=base_url();?>">Home</a></li>
    <li><a href="<?=base_url();?>search/<?=$name;?>" class="current">Search: <?=$name;?></a></li>
</ul>
<div class="container">
    <div class="row top">
        <div class="span9">
            <?
            for($i=0;$i<10;$i++){
                if(!empty($repos->repositories[$i])){
                    $like_flag = FALSE;
                    $repo_info=$this->github->get_repository($repos->repositories[$i]->owner,$repos->repositories[$i]->name);
                    foreach($user_likes->result() as $like){
                        if($like->id_respo == $repo_info->id){
                            $like_flag = TRUE;
                        }
                    }
            ?>
            <div class="repos">
                <p>
                    <?=anchor(base_url().'repos/'.$repos->repositories[$i]->owner.'/'.$repos->repositories[$i]->name,$repos->repositories[$i]->name).
                    '<span class="tab"></span>';
                    echo $repos->repositories[$i]->homepage ? anchor($repos->repositories[$i]->homepage,$repos->repositories[$i]->homepage,'target="_blank"') : '';
                    echo '<span class="tab"></span>'.
                    anchor(base_url().'user/'.$repos->repositories[$i]->owner,$repos->repositories[$i]->owner);
                    ?>
                </p>
                <p><?=$repos->repositories[$i]->description;?></p>
                <p>
                    Watchers: <?=$repos->repositories[$i]->watchers.
                    '<span class="tab"></span>Forks: '.
                    $repos->repositories[$i]->forks.
                    '<span class="tab"></span>';
                    echo $like_flag ? '<span id="answ'.$repo_info->id.'"><button class="dislike" onclick="like_repo('.$repo_info->id.');"></button></span>' : '<span id="answ'.$repo_info->id.'"><button class="like" onclick="like_repo('.$repo_info->id.');"></button></span>';
                    ?>
                </p>
            </div>
            <?
                }
            }
            ?>
        </div>
    </div>