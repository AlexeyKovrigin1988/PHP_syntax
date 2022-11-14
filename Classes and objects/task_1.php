<?php
class TelegraphText
{
   public $text;
   public $title;
   public $author;
   public $published;
   public $slug;
   public $arr;

   public function __construct($author, $slug)
   {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
   }

   public function storeText()
   {
        $this->arr = [
            "text" => $this->text,
            "title" => $this->title,
            "author" => $this->author,
            "published" => $this->published,
        ];

        file_put_contents($this->slug, serialize($this->arr));
   }

   public function loadText()
   {
       $saved_text = file_get_contents($this->slug);
       $transformation = unserialize($saved_text);

       $this->arr = $transformation;

       return $this->arr['text'];
   }

   public function editText($text, $title)
   {
       $this->arr = [
           "text" => $text,
           "title" => $title,
           "author" => $this->author,
           "published" => $this->published,
       ];
   }
}

$telegraph = new TelegraphText("We","new.txt");
$telegraph->editText("новый текст", "название статьи");
$telegraph->storeText();
$test = $telegraph->loadText();
var_dump($test);
