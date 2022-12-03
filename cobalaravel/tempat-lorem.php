<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati ut qui
     nobis maxime rerum temporibus. Perferendis ea obcaecati placeat excepturi
     aliquid omnis, fuga illo quia saepe dolor laboriosam, soluta alias incidunt
     molestiae cumque reiciendis esse. Porro ipsum quasi perspiciatis?
     Laboriosam, at esse accusamus quis quia, vitae architecto eligendi facere
     perspiciatis ex libero ratione enim quasi minus sint quos! Amet culpa
     laboriosam, voluptas corporis aspernatur, dolorem dolores consequatur nam
     tempora obcaecati vitae repellat ipsum nulla, temporibus quo laudantium
     libero inventore omnis dolor. Possimus architecto culpa, laboriosam aliquid,
     mollitia aliquam odio aspernatur rem accusamus, minus officiis sapiente
     asperiores? Nostrum sit deleniti, nulla ut alias fugiat libero dolore
     exercitationem, provident maxime ipsum expedita quos aliquid? Ad soluta
     rerum debitis corrupti esse nobis harum!

</body>

</html>



<?php

Post::create([
     'title' => 'Judul Ketiga',
     'category_id' => 1,
     'slug' => 'judul-pertama',
     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati ut qui nobis maxime',
     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem assumenda magni deleniti maiores explicabo accusamus eligendi veritatis sunt. Vel tenetur vero molestias pariatur reprehenderit accusamus ipsa corrupti quod, illum voluptates perferendis eum dicta </p> <p>ullam modi in, aliquam libero blanditiis nam temporibus quasi consequatur corporis repellat voluptate. Dolor similique aliquam, et ad soluta ratione eligendi illum? Eum explicabo ex cum vitae distinctio eaque quaerat optio perspiciatis eos adipisci odio iusto praesentium obcaecati dolorem repellat officiis sapiente et tenetur porro tempore aspernatur, nemo eveniet. Quae repellendus quis perspiciatis ipsam debitis consequuntur, dicta vel dolor architecto voluptates modi est voluptate esse temporibus. Distinctio quisquam magnam quia placeat provident, tenetur unde deserunt perspiciatis modi, ducimus, aut sed consequatur molestiae ratione velit mollitia culpa.</p>'
])

Category::create([
     'name' => 'Personal',
     'slug' => 'personal',
])

?>