<!-- Content -->
<ul id="breadcrumbs">
    <li><a href="<?=base_url();?>">Home</a></li>
    <li><a href="<?=base_url();?>user/<?=$user->login;?>" class="current">User: <?=$user->login;?></a></li>
</ul>
<div class="container">
    <div class="row top">
        <div class="span9">
            <div class="profile-pic">
                <img src="<?=$user->avatar_url;?>" />
            </div>
            <h4 class="v-card">
                <span itemprop="name"><?=$user->name;?></span>
                <em itemprop="additionalName"><?=$user->login;?></em>
            </h4>
            <div class="details">
                <span>Company: <?=$user->company;?></span>
                <span>Blog: <?=$user->blog ? anchor($user->blog,$user->blog,'target="_blank"') : '';?></span>
                <span>Followers: <?=$user->followers;?></span>
                <span>
                <?php
                    echo $like->num_rows()<1 ? '<div id="answ'.$user->id.'"><button class="like" onclick="send('.$user->id.');"></button></div>' : '<div id="answ'.$user->id.'"><button class="dislike" onclick="send('.$user->id.');"></button></div>';
                ?>
                </span>
            </div>
        </div>
    </div>