<?php

abstract class Storage
{
    abstract public function create($TelegraphText) : string;
    abstract public function read($id = null, $slug = null) : object;
    abstract public function update($item, $id = null, $slug = null) ;
    abstract public function delete($id = null, $slug = null);
    abstract public function dataList() : array;
}

abstract class View
{
    public $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    abstract public function displayTextById($id);
    abstract public function displayTextByUrl($url);
}

abstract class User
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit();
}

class FileStorage extends Storage
{
    public function create($TelegraphText) : string
    {
        $path = explode('.', $TelegraphText->slug);

        $fileName = $path[0] . date('YmdHis');

        if (file_exists($fileName . '.txt')) {
            for ($i = 1; $i < 10; $i++) {
                $newFileName = $fileName . '_' . $i;
                if (file_exists($newFileName . '.txt')) {
                    if ($i = 9) {
                        echo "Произошла ошибка создания имени файла";
                    }
                } else {
                    $fileName = $newFileName;
                    break;
                }
            }
        }
        $this->slug = $fileName;

        file_put_contents($this->slug . ".txt", serialize($TelegraphText));

        return $this->slug;
    }

    public function read($id = null, $slug = null) : object
    {
        if ($this->dataVerification($slug)) {
            echo "Ошибка ввода ссылки на чтение";
            exit();
        }

        $saved_object = file_get_contents($this->slug . '.txt');
        $transformation = unserialize($saved_object);

        return $transformation;
    }

    public function update($item, $id = null, $slug = null)
    {
        if ($this->dataVerification($slug)) {
            echo "Ошибка ввода ссылки на чтение";
            exit();
        }

        $searchRoot = 'C:/xampp/htdocs/Module-9';
        $arr_files = scandir($searchRoot);

        foreach ($arr_files as $file) {
            if ($file == $slug) {
                file_put_contents($slug, serialize($item));
                echo "файл нашёлся";
            }
        }
    }

    public function delete($id = null, $slug = null)
    {
        if ($this->dataVerification($slug)) {
            echo "Ошибка ввода ссылки на чтение";
            exit();
        }

        $searchRoot = 'C:/xampp/htdocs/Module-9';
        $arr_files = scandir($searchRoot);

        foreach ($arr_files as $file) {
            if ($file == $slug) {
                unlink($searchRoot . "/" . $slug);
                echo ("Файл удалён");
            }
        }
    }

    public function dataList(): array
    {
        $list = [];
        $searchRoot = 'C:/xampp/htdocs/Module-9';
        $arr_files = scandir($searchRoot);

        foreach ($arr_files as $file) {
            if ($file == "." || $file == ".." || $file == ".idea" || $file == "index.php") {
                continue;
            } else {
                $saved_object = file_get_contents($file);
                $transformation = unserialize($saved_object);
                $list[] = $transformation;
            }
        }
        print_r($list);

        return $list;
    }

    // Проверка на то, что ввели название файла
    private function dataVerification ($slug) : bool
    {
        if ($slug == null) {
            return true;
        }
        return false;
    }
}

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

$test = new FileStorage();
//$test->create(new TelegraphText("We","new.txt"));
//$test->read(null,"new20221029130925.txt");
//$test->update(new FileStorage(), null, 'new20221029135600.txt');
//$test->delete(null,"new20221029135600.txt");
//$test->dataList();
