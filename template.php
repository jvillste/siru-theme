<?php

function siru_preprocess_page(&$variables) {
  $theme_page_id = '1';
  $initiative_page_id = '80';
  $calendar_page_id = '79';
  
  $is_blog_page = arg(0) == 'taxonomy'
     || arg(0) == 'blog'
     || (isset($variables['node']) && $variables['node']->type == 'story');

  if(arg(0) == 'blog' && arg(1) == 'newest')
  {
  	  $variables['feed_link'] = '<a class="feed-link" href="/blog/rss"><img src="/misc/feed.png" /></a>';
  }
  	
  $is_initiative_page = (isset($variables['node']) && ( $variables['node']->type == 'aloite' || $variables['node']->nid == $initiative_page_id ));
     
  $active_top_menu_tab = '';
  if($is_blog_page)
  {
     $active_top_menu_tab = 'blog/all';
	 $variables['right_image'] = base_path() . path_to_theme() . '/images/vaalikuvat/Kauppinen_10-08-18_050_web.jpg';
  } else if($is_initiative_page ) {
     $active_top_menu_tab = 'node/' . $initiative_page_id;
	 $variables['right_image'] = base_path() . path_to_theme() . '/images/vaalikuvat/Kauppinen_10-08-18_068_web.jpg';
  } else if( (isset($variables['node']) && $variables['node']->type == 'teema' )) {
	 $variables['right_image'] = base_path() . path_to_theme() . '/images/vaalikuvat/Kauppinen_10-08-18_072_web.jpg';
  } else if($is_initiative_page || (isset($variables['node']) && $variables['node']->type == 'teema' )) {
	 $variables['right_image'] = base_path() . path_to_theme() . '/images/vaalikuvat/Kauppinen_10-08-18_072_web.jpg';
  }else if(isset($variables['node']) && isset($variables['node']->field_image_on_right) && $variables['node']->field_image_on_right[0][view] == '') {
    $variables['right_image']  = null;
  } else if(isset($variables['node']) && isset($variables['node']->field_image_on_right)) {
    $variables['right_image']  = base_path() . path_to_theme() . '/images/vaalikuvat/' . $variables['node']->field_image_on_right[0][view];
  }else {
     $variables['right_image'] = base_path() . path_to_theme() . '/images/siru_ja_pallo.png';
  }
 
  
  //$variables['debug'] = "active top menu tab " . $active_top_menu_tab . " " .  $variables['node']->type;
  //$variables['debug'] =  $variables['right_image'];
	 
	 
  $variables['top_menu'] = top_menu($variables['primary_links'],$active_top_menu_tab);
  $variables['left_menu'] = left_menu($variables['secondary_links']);




  // Disable title
  if((isset($variables['node']) && ($variables['node']->type == 'page'))
          || arg(0) == 'taxonomy' || arg(0) == 'search' )
    {
        $variables['title'] = NULL;
    }

  if($is_blog_page)
    {

        $links = array();
        //$links[] = array('href' => 'blog/newest', 'title' => 'Uusimmat');
        $links[] = array('href' => 'blog/all', 'title' => 'Kaikki');
        $links = array_merge($links, $variables['secondary_links']);

        $node_terms = array();
        if(isset($variables['node']))
        {
            foreach(taxonomy_node_get_terms($variables['node']) as $term_id => $term)
            {
                $node_terms[$term_id] = '';
            }
        }
        
        foreach(taxonomy_get_tree(2) as $term)
        {
            $class = 'taxonomy_term';

            if(arg(0)=='taxonomy' && arg(1)=='term' && arg(2)==$term->tid)
            {
                $class .= ' active';
            }else if(isset($node_terms[$term->tid]))
            {
                $class .= ' highlighted';
            }

            $links[] = array('href' => 'taxonomy/term/' . $term->tid, 'title' => $term->name, 'class' => $class);
        }

        $variables['left_menu'] = left_menu($links);

    }

  if (isset($variables['node'])) {

    $id = $variables['node']->nid;

    // Theme page settings
    if($id == $theme_page_id  )
    {
        $variables['right_image'] = NULL;
        $variables['title'] = NULL;
    }
	
  }
  
}


/**
 * Format a username.
 *
 * @param $object
 *   The user object to format, usually returned from user_load().
 * @return
 *   A string containing an HTML link to the user's page if the passed object
 *   suggests that this is a site user. Otherwise, only the username is returned.
 */
function siru_username($object) {

  if ($object->uid && $object->name) {
    // Shorten the name when it is too long or it will break many tables.
    if (drupal_strlen($object->name) > 20) {
      $name = drupal_substr($object->name, 0, 15) .'...';
    }
    else {
      $name = $object->name;
    }

    if (user_access('access user profiles')) {
      $output = l($name, 'user/'. $object->uid, array('attributes' => array('title' => t('View user profile.'))));
    }
    else {
      $output = check_plain($name);
    }
  }
  else if ($object->name) {
    // Sometimes modules display content composed by people who are
    // not registered members of the site (e.g. mailing list or news
    // aggregator modules). This clause enables modules to display
    // the true author of the content.
    if (!empty($object->homepage)) {
      $output = l($object->name, $object->homepage, array('attributes' => array('rel' => 'nofollow')));
    }
    else {
      $output = check_plain($object->name);
    }

    //$output .= ' ('. t('not verified') .')';
  }
  else {
    $output = check_plain(variable_get('anonymous', t('Anonymous')));
  }

  return $output;
}

function top_menu($links, $active_tab) {

     $output = '';

  if (count($links) > 0) {

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);


      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      
      if ($i == $num_links) {
        $class[] = 'last';
      }

      if (isset($link['href']) && $link['href'] == $active_tab){
        $class[] = 'active-trail';
      }

      $class_attributes = implode(' ', $class);
      $output .= '<div class="top_menu_tab_spacer"></div>';
      $output .= '<a href="' . url($link['href']) . '" class="top-tab-left ' . $class_attributes . '"></a>';
      $output .= '<a href="' . url($link['href']) . '" class="top-tab-middle ' . $class_attributes . '" ><span  class="tab-header left-tab-title">' . $link['title'] . '</span></a>';
      $output .= '<a href="' . url($link['href']) . '" class="top-tab-right ' . $class_attributes . '"></a>';
      $output .= "\n";
      
      $i++; 
    }
  }

  return $output;
}

function left_menu($links) {
     $output = '';

  if (count($links) > 0) {

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);
        $class[] = $link['class'];
      

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))){
        $class[] = 'active';
      }

      $class_attributes = implode(' ', $class);
      
      $output .= '<div style="clear:both;" ></div>';
      $output .= '<div class="left_menu_tab_spacer"></div>';
      $output .= '<div style="clear:both;" ></div>';
     
      $output .= '<a href="' . url($link['href']) . '" class="left-tab-left ' . $class_attributes . '"></a>';
      $output .= '<a href="' . url($link['href']) . '" class="left-tab-right ' . $class_attributes . '" style="overflow:hidden;"><span class="tab-header top-tab-title">' . $link['title'] . '</span></a>';
      $output .= "\n";

      $i++;
    }
  }

  return $output;
}


function siru_preprocess_search_theme_form(&$vars, $hook) {

  // Modify elements of the search form
  $vars['form']['search_theme_form']['#title'] = t('');

  // Set a default value for the search box
  $vars['form']['search_theme_form']['#value'] = t('');

  // Add a custom class to the search box
  $vars['form']['search_theme_form']['#attributes'] = array('class' => t('cleardefault'));

  // Change the text on the submit button
  $vars['form']['submit']['#value'] = t('Etsi');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_theme_form']['#printed']);
  $vars['search']['search_theme_form'] = drupal_render($vars['form']['search_theme_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}

function siru_theme(){
    return array(
         'comment_form' => array(
              'arguments' => array('form' => NULL)
            ),
    );
}

function siru_comment_form($form) {
    //return print_r($form);
    //$form['name']['#default_value'] = 'foo';
    //$form['name']['#value'] = 'foo';
    unset($form['homepage']);
    unset($form['mail']);
    $output .= drupal_render($form);
    return $output;
}


    function next_node($node)
    {   
        $query = db_rewrite_sql("SELECT nid, title FROM {node} WHERE created > '%s' AND status=1 and promote=1 AND type='%s' ORDER BY created ASC LIMIT 1", "node", "nid");
        
        $result = db_query($query, $node->created, $node->type);

       $next_node = db_fetch_object($result);
       
        if($next_node->nid!=NULL)
        {
            return l("Seuraava >>", 'node/'.$next_node->nid);
        }
        else
        {
            return NULL;
        }
    }

    function previous_node($node)
    {   

        $query = db_rewrite_sql("SELECT nid, title FROM {node} WHERE created < '%s' AND status=1 and promote=1 AND type='%s' ORDER BY created DESC LIMIT 1", "node", "nid");
        
        $result = db_query($query, $node->created, $node->type);

       $previous_node = db_fetch_object($result);
       
        if($previous_node->nid!=NULL)
        {
            return l("<< Edellinen", 'node/'.$previous_node->nid);
        }
        else
        {
            return NULL;
        }
    }