# phpXQL
Inspired by RealDB functions, a database like xpath HTML/XML retriver

Usage:
```PHP
  $objXQL = new abbyLibs\phpXQL($url);
  $path = '//*[@id="DivContentLeft"]/div[3]/div[2]/div[3]/div[1]/table/tr[?]/td[?]';
  $arr = $objXQL->arr($path,[0,4],[0,4]);
  print_r($arr);
  
  $path = '//*[@id="DivContentLeft"]/div[3]/div[2]/div[3]/div[1]/table/tr[2]/td[?]';
  $arr = $objXQL->row($path,[0,4]);
  print_r($arr);
  
  $path = '//*[@id="DivContentLeft"]/div[3]/div[2]/div[3]/div[1]/table/tr[2]/td[3]';
  $string = $objXQL->row($path);
  echo $string;
```

Packgist: `https://packagist.org/packages/abby-libs/php-xql`

Composer: `composer require abby-libs/php-xql`

Apache2.0 license. Welcome to fork and use at any cause. I would be happy to hear from any words!
