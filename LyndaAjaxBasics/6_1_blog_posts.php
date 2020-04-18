<?php
  // You can simulate a slow server with sleep
  //sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  // Typically, this would be a call to a database
    //Aquí recoge qué página es en la que nos encotramos.
  function find_blog_posts($page) {
    $first_post = 101;
    $per_page = 3;
    //Cua´´tas entrada tiene que mostrar, comprueba en qué página estamos, menos 1 * página. + 1
    $offset = (($page - 1) * $per_page) + 1;

    $blog_posts = [];
    // This is our "fake" database lo hacemos para repetir entradas del blog
    for($i=0; $i < $per_page; $i++) {
        //Dar calor al ID de la entrada
      $id = $first_post - 1 + $offset + $i;
      //El blog es un array asociativo
      $blog_post = [
        'id' => $id,
        'title' => "Blog Post #{$id}",
        'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt."
      ];
      $blog_posts[] = $blog_post;
    }
    return $blog_posts;
  }

  if(!is_ajax_request()) { exit; }
    //Comprueba que lo que recibimos por get es un entero y si no nos pone 1
  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

  //Ejecutamos la función y enviamos como parámetro en qué página estamos.
  $blog_posts = find_blog_posts($page);

?>
//Este for each recorre los post y lo devuelve en HTML - Se dpodría haver tambien en JSON
<?php foreach($blog_posts as $blog_post) { ?>
  <div id="blog-post-<?php echo $blog_post['id']; ?>" class="blog-post">
    <h3><?php echo $blog_post['title']; ?></h3>
    <p><?php echo $blog_post['content']; ?></p>
  </div>
<?php } ?>
