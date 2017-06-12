<?php
  function team_add_excerpt(){
    $args = get_post_type_object("team");
    $args->supports[] = "excerpt";
    register_post_type($args->name, $args);
  }
  add_action( 'init', 'team_add_excerpt' ,20);
?>