<?php
namespace Stephane888\HtmlBootstrap\Controller;

use Stephane888\HtmlBootstrap\LoaderDrupal;
use Stephane888\HtmlBootstrap\Traits\Portions;
use Stephane888\HtmlBootstrap\Entity\ImageStyleTheme;
use Stephane888\HtmlBootstrap\ThemeUtility;

class Cards implements ControllerInterface {
  use Portions;

  protected $BasePath = '';

  protected $themeObject = null;

  function __construct($path = null)
  {
    $this->BasePath = $path;
    $this->themeObject = \Drupal::theme()->getActiveTheme();
  }

  /**
   * Using default template 'inline_template'
   */
  public function loadFile($options)
  {
    /**
     * get datas
     */
    if (isset($options['cards'])) {
      $cards = $options['cards'];
    }

    /**
     * get class of blocs
     */
    if (isset($options['card_class_block'])) {
      $card_class_block = $options['card_class_block'];
    } else {
      $card_class_block = "col-md-6 col-lg-3";
    }

    /**
     * Get class of nombre_item
     */
    if (isset($options['nombre_item'])) {
      $nombre_item = $options['nombre_item'];
    } else {
      $nombre_item = 4;
    }

    /**
     * Get type
     */
    if (isset($options['type'])) {
      if ($options['type'] == 'IconeModelFlat') {
        if (empty($cards)) {
          $number = 8;
          $cards = $this->loadDefaultData($number);
        }
        $fileName = \file_get_contents($this->BasePath . '/Sections/Cards/IconeModelFlat/Drupal.html.twig');
        LoaderDrupal::addStyle(\file_get_contents($this->BasePath . '/Sections/Cards/IconeModelFlat/style.scss'), 'Cards-IconeModelFlat');
        return [
          '#type' => 'inline_template',
          '#template' => $fileName,
          '#context' => [
            'cards' => $cards,
            'card_class_block' => $card_class_block
          ]
        ];
      } elseif ($options['type'] == 'PostsVerticalM1') {
        if (empty($cards)) {
          $cards = $this->loadDefaultData__PostsVerticalM1($nombre_item);
        }
        $fileName = \file_get_contents($this->BasePath . '/Sections/Cards/PostsVerticalM1/Drupal.html.twig');
        LoaderDrupal::addStyle(\file_get_contents($this->BasePath . '/Sections/Cards/PostsVerticalM1/style.scss'), 'Cards-PostsVerticalM1');
        return [
          '#type' => 'inline_template',
          '#template' => $fileName,
          '#context' => [
            'cards' => $cards
          ]
        ];
      } elseif ($options['type'] == 'CardsModel2') {
        /**
         * get class of blocs
         */
        if (isset($options['title'])) {
          $title = $options['title'];
        } else {
          $title = "Future on the producty";
        }
        /**
         * get class of description
         */
        if (isset($options['description'])) {
          $description = $options['description'];
        } else {
          $faker = \Faker\Factory::create();
          $faker->seed(12956812258);
          $description = $faker->unique()->realText(rand(100, 120));
        }
        if (empty($cards)) {
          $cards = $this->loadDefaultData($nombre_item);
          $card_class_block = "col-lg-6";
        }
        $fileName = \file_get_contents($this->BasePath . '/Sections/Cards/Model2/Drupal.html.twig');
        LoaderDrupal::addStyle(\file_get_contents($this->BasePath . '/Sections/Cards/Model2/style.scss'), 'Cards-Model2');
        return [
          '#type' => 'inline_template',
          '#template' => $fileName,
          '#context' => [
            'cards' => $cards,
            'title' => $title,
            'description' => $description,
            'card_class_block' => $card_class_block
          ]
        ];
      } elseif ($options['type'] == 'StepModel1') {
        /**
         * Get class of title
         */
        if (isset($options['title'])) {
          $title = $options['title'];
        } else {
          $title = "Imaginez, Créez, Vendez";
        }
        if (empty($cards)) {
          $cards = $this->loadDefaultData_StepModel1($nombre_item);
          $card_class_block = "col-lg-3";
        }
        $fileName = \file_get_contents($this->BasePath . '/Sections/Cards/StepModel1/Drupal.html.twig');
        LoaderDrupal::addStyle(\file_get_contents($this->BasePath . '/Sections/Cards/StepModel1/style.scss'), 'Cards-StepModel1');
        return [
          '#type' => 'inline_template',
          '#template' => $fileName,
          '#context' => [
            'cards' => $cards,
            'title' => $title,
            'card_class_block' => $card_class_block
          ]
        ];
      } elseif ($options['type'] == 'CardsModel3') {

        /**
         * Get class of title
         */
        if (isset($options['title'])) {
          $title = $options['title'];
        } else {
          $title = "Telecharger les livres";
        }

        /**
         * Get class of message
         */
        if (isset($options['message'])) {
          $message = $options['message'];
        } else {
          $faker = \Faker\Factory::create();
          $faker->seed(12956812258);
          $message = $faker->realText(rand(180, 210));
        }

        /**
         * Get class of title
         */
        if (isset($options['description'])) {
          $description = $options['description'];
        } else {
          $faker = \Faker\Factory::create();
          $faker->seed(12956812258);
          $description = $faker->realText(rand(100, 130));
        }

        if (empty($cards)) {
          $cards = $this->loadDefaultData($nombre_item);
          $card_class_block = "col-md-6 col-lg-3";
        }
        $icon_pdf = '/' . drupal_get_path('theme', $this->themeObject->getName()) . '/defaultfile/Cards/Model3/pdf-icon-11549528510ilxx4eex38.png';
        $fileName = \file_get_contents($this->BasePath . '/Sections/Cards/Model3/Drupal.html.twig');
        LoaderDrupal::addStyle(\file_get_contents($this->BasePath . '/Sections/Cards/Model3/style.scss'), 'CardsModel3');
        LoaderDrupal::addScript(\file_get_contents($this->BasePath . '/Sections/Cards/Model3/script.js'), 'CardsModel3');
        // dump($cards);
        return [
          '#type' => 'inline_template',
          '#template' => $fileName,
          '#context' => [
            'cards' => $cards,
            'title' => $title,
            'description' => $description,
            'card_class_block' => $card_class_block,
            'message' => $message,
            'icon_pdf' => $icon_pdf
          ]
        ];
      }
    }
  }

  /**
   *
   * @param number $number
   * @return string[][]
   */
  protected function loadDefaultData_StepModel1($number = 3)
  {
    $cards = [];
    $faker = \Faker\Factory::create();
    for ($i = 0; $i < $number; $i ++) {
      $cards[$i] = [
        'text' => $faker->unique()->realText(rand(70, 90))
      ];
    }
    return $cards;
  }

  /**
   * Load defalut vertical PostsVerticalM1
   */
  protected function loadDefaultData__PostsVerticalM1($number = 3)
  {
    // $image_style = 'thumbnail';
    // $attributes = \Drupal\image\Entity\ImageStyle::load($image_style)->buildUrl();
    $imgs = $this->defaultImg();
    $cards = [];
    $faker = \Faker\Factory::create();
    $faker->seed(12956812258);
    for ($i = 0; $i < $number; $i ++) {
      $img_url = (isset($imgs[$i])) ? $imgs[$i] : 'themes://defaultfile/CarouselCards/Modele1/photodune-6590781-product-launch-flat-illustration-2-700x400.jpg';
      // $img_url0 = file_create_url(drupal_get_path('theme', $this->themeObject->getName()) . $img_url) . '?itok=_DGxyx-M';
      // dump($img_url0);
      // $img_url0 = \Drupal\image\Entity\ImageStyle::load($image_style)->buildUrl($img_url);
      // dump(file_uri_scheme('themes://mon-image.jpg'));
      $img_url = '/' . drupal_get_path('theme', $this->themeObject->getName()) . $img_url;
      // $img_url0 = ImageStyleTheme::load($image_style);

      $cards[] = [
        'link' => '#',
        'img' => [
          'alt' => '',
          'src' => $img_url
        ],
        'title' => $faker->unique()->realText(rand(30, 50)),
        'date' => '21 Mar 2014'
      ];
    }
    return $cards;
  }

  /**
   *
   * @param number $number
   */
  protected function loadDefaultData($number = 8)
  {
    $imgs = $this->defaultImgBooks();
    $icones = $this->defaultIcone();
    $cards = [];
    $faker = \Faker\Factory::create();
    $faker->seed(12548512475); // permet de generer le meme texte durant une session.
    for ($i = 0; $i < $number; $i ++) {
      $cards[] = [
        'title' => $faker->unique()->realText(rand(15, 30)),
        'text' => $faker->text,
        'icone' => (isset($icones[$i])) ? $icones[$i] : '<i class="fas fa-chart-bar"></i>',
        'link' => '#', // optional
        'button' => 'Telecharger',
        'img' => [
          'src' => (isset($imgs[$i])) ? '/' . drupal_get_path('theme', $this->themeObject->getName()) . $imgs[$i] : '/' . drupal_get_path('theme', $this->themeObject->getName()) . '/defaultfile/CarouselCards/Modele3/fruits--nutrition--sante--bien-etre-jbgatj.jpg'
        ]
      ];
    }
    return $cards;
  }

  public static function listModels()
  {
    return [
      'IconeModelFlat' => 'IconeModelFlat',
      'PostsVerticalM1' => 'PostsVerticalM1',
      'CardsModel2' => 'CardsModel2',
      'StepModel1' => 'StepModel1',
      'CardsModel3' => 'CardsModel3'
    ];
  }

  public static function loadFieldsNodes($model, &$form, $options)
  {
    $ThemeUtility = new ThemeUtility();
    $ManageNode = new ManageNode();
    if ('CardsModel3' == $model) {
      $contentTypes = $ManageNode->getContentType();
      /**
       * le champs titre
       */
      $name = 'title';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextfieldTree($name, $form, 'Titre', $FieldValue);
      /**
       * le champs description
       */
      $name = 'description';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextareaSimpleTree($name, $form, 'Description', $FieldValue);

      /**
       * le champs description
       */
      $name = 'message';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextareaSimpleTree($name, $form, 'Message', $FieldValue);

      /**
       * le champs nombre_item
       */
      $name = 'nombre_item';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : 4;
      $ThemeUtility->addTextfieldTree($name, $form, 'Nombre de blocs', $FieldValue);
      /**
       * le champs selection du type de contenu
       */
      $name = 'content_type';
      $FieldValue = $bundle = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addSelectTree($name, $form, $contentTypes, 'Selectionner le type de contenu', $FieldValue);
      if ($bundle != '') {
        $listsFields = $ManageNode->getFieldsNode($bundle);
        $container = 'cards';
        $form[$container] = [
          '#type' => 'details',
          '#title' => 'Champs ',
          '#open' => true
        ];
        /**
         * le champs titre
         */
        $name = 'title';
        $FieldValue = (! empty($options[$container][$name])) ? $options[$container][$name] : '';
        $ThemeUtility->addSelectTree($name, $form[$container], $listsFields, 'Champs Titre', $FieldValue);
        /**
         * le champs titre
         */
        $name = 'text';
        $FieldValue = (! empty($options[$container][$name])) ? $options[$container][$name] : '';
        $ThemeUtility->addSelectTree($name, $form[$container], $listsFields, 'Champs description courte', $FieldValue);
        /**
         * le champs image
         */
        $name = 'img';
        $FieldValue = (! empty($options[$container][$name])) ? $options[$container][$name] : '';
        $ThemeUtility->addSelectTree($name, $form[$container], $listsFields, 'Champs image', $FieldValue);

        /**
         * le champs nombre_item
         */
        $name = 'button';
        $FieldValue = (! empty($options[$container][$name])) ? $options[$container][$name] : 'Télécharger';
        $ThemeUtility->addTextfieldTree($name, $form[$container], 'texte download', $FieldValue);
      }
    }
  }

  public static function loadFields($model, &$form, $options)
  {
    $ThemeUtility = new ThemeUtility();

    if ($model == 'CardsModel2') {
      /**
       * le champs titre
       */
      $name = 'title';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextfieldTree($name, $form, 'Titre', $FieldValue);
      /**
       * le champs description
       */
      $name = 'description';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextareaSimpleTree($name, $form, 'Description', $FieldValue);
      /**
       * class card_class_block
       */
      $name = 'card_class_block';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : 'col-lg-6';
      $ThemeUtility->addTextfieldTree($name, $form, 'Class colonne bootstrap', $FieldValue);
      /**
       * le champs nombre_item
       */
      $name = 'nombre_item';
      $nombre_item = $FieldValue = (! empty($options[$name])) ? $options[$name] : 4;
      $ThemeUtility->addTextfieldTree($name, $form, 'Nombre de blocs', $FieldValue);
      $container = 'cards';

      for ($i = 0; $i < $nombre_item; $i ++) {
        $form[$container][$i] = [
          '#type' => 'details',
          '#title' => 'Blocs : ' . ($i + 1),
          '#open' => false
        ];
        /**
         * le champs titre
         */
        $name = 'title';
        $FieldValue = (! empty($options[$container][$i][$name])) ? $options[$container][$i][$name] : '';
        $ThemeUtility->addTextfieldTree($name, $form[$container][$i], 'Titre', $FieldValue);
        /**
         * le champs text
         */
        $name = 'text';
        $FieldValue = (! empty($options[$container][$i][$name])) ? $options[$container][$i][$name] : '';
        $ThemeUtility->addTextareaSimpleTree($name, $form[$container][$i], 'Description ', $FieldValue);
        /**
         * le champs icone
         */
        $name = 'icone';
        $FieldValue = (! empty($options[$container][$i][$name])) ? $options[$container][$i][$name] : '';
        $ThemeUtility->addTextfieldTree($name, $form[$container][$i], 'Icone fontawesome', $FieldValue);
        /**
         * le champs link
         */
        $name = 'link';
        $FieldValue = (! empty($options[$container][$i][$name])) ? $options[$container][$i][$name] : '';
        $ThemeUtility->addTextfieldTree($name, $form[$container][$i], 'Lien vers le contenu', $FieldValue);
      }
    } elseif ($model == 'StepModel1') {
      /**
       * le champs titre
       */
      $name = 'title';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : '';
      $ThemeUtility->addTextfieldTree($name, $form, 'Titre', $FieldValue);
      /**
       * class card_class_block
       */
      $name = 'card_class_block';
      $FieldValue = (! empty($options[$name])) ? $options[$name] : 'col-lg-3';
      $ThemeUtility->addTextfieldTree($name, $form, 'Class colonne bootstrap', $FieldValue);
      /**
       * Le champs nombre_item
       */
      $name = 'nombre_item';
      $nombre_item = $FieldValue = (! empty($options[$name])) ? $options[$name] : 4;
      $ThemeUtility->addTextfieldTree($name, $form, 'Nombre de blocs', $FieldValue);
      $container = 'cards';
      for ($i = 0; $i < $nombre_item; $i ++) {
        $form[$container][$i] = [
          '#type' => 'details',
          '#title' => 'Blocs : ' . ($i + 1),
          '#open' => false
        ];
        /**
         * Le champs text
         */
        $name = 'text';
        $FieldValue = (! empty($options[$container][$i][$name])) ? $options[$container][$i][$name] : '';
        $ThemeUtility->addTextareaSimpleTree($name, $form[$container][$i], 'Description ', $FieldValue);
      }
    }
  }

  protected function defaultIcone()
  {
    return [
      '<i class="fab fa-accusoft"></i>',
      '<i class="fab fa-adn"></i>',
      '<i class="fab fa-apple"></i>',
      '<i class="fas fa-balance-scale"></i>',
      '<i class="fas fa-blender"></i>',
      '<i class="fas fa-box-open"></i>',
      '<i class="fas fa-bullhorn"></i>',
      '<i class="fas fa-camera-retro"></i>'
    ];
  }

  protected function defaultImg()
  {
    return [
      // 'Peuple-Migrateur-Galatee-Films-3921.jpg',
      '/defaultfile/CarouselCards/Modele1/Fotolia_32338952_Subscription_Monthly_XL-700x400.jpg',
      // 'themes://defaultfile/CarouselCards/Modele1/Fotolia_32338952_Subscription_Monthly_XL-700x400.jpg',
      '/defaultfile/CarouselCards/Modele1/Fotolia_33064312_Subscription_Monthly_XXL-700x400.jpg',
      '/defaultfile/CarouselCards/Modele1/photodune-6147544-brainstorming-ideas-with-coffee-m-700x400.jpg',
      '/defaultfile/CarouselCards/Modele1/photodune-6243139-vintage-photography-m-700x400.jpg',
      '/defaultfile/CarouselCards/Modele1/photodune-6252039-web-and-seo-analytics-concept-m-700x400.jpg',
      '/defaultfile/CarouselCards/Modele1/photodune-6590781-product-launch-flat-illustration-2-700x400.jpg'
    ];
  }

  protected function defaultImgBooks()
  {
    return [
      '/defaultfile/Cards/Model3/101-smoothies-pour-votre-sante.jpg',
      // '/defaultfile/Cards/Model3/51dQOVYoG2L._SX374_BO1,204,203,200_.jpg',
      '/defaultfile/Cards/Model3/51QGnnhNbsL._SX347_BO1,204,203,200_.jpg',
      '/defaultfile/Cards/Model3/9782017020240-001-T.jpeg',
      // '/defaultfile/Cards/Model3/9782017084365-001-T.jpeg',
      // '/defaultfile/Cards/Model3/9782017084488-001-T.jpeg',
      '/defaultfile/Cards/Model3/fruits--nutrition--sante--bien-etre-jbgatj.jpg',
      '/defaultfile/Cards/Model3/les-recettes-du-regime-ig.jpg'
    ];
  }
}