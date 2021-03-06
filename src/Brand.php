<?php

      $DB = new PDO('pgsql:host=localhost;dbname=shoes');

      class Brand
      {
        private $brand_name;
        private $id;

        function __construct($brand_name, $id = null)
        {
          $this->brand_name = $brand_name;
          $this->id = $id;
        }

        function getBrandName()
        {
          return $this->brand_name;
        }

        function setBrandName($new_brand_name)
        {
          $this->brand_name = (string) $new_brand_name;
        }

        function getId()
        {
          return $this->id;
        }

        function setId($new_id)
        {
          $this->id = (int) $new_id;
        }

        function save()
        {
          $statement = $GLOBALS['DB']->query("INSERT INTO brands (brand_name) VALUES ('{$this->getBrandName()}') RETURNING id;");
          $result = $statement->fetch(PDO::FETCH_ASSOC);
          $this->setId($result['id']);
        }

        static function getAll()
        {
          $returned_brands = $GLOBALS['DB']->query('SELECT * FROM brands;');

          $brands = array();
          foreach($returned_brands as $brand) {
            $brand_name = $brand['brand_name'];
            $id = $brand['id'];
            $new_brand = new Brand($brand_name, $id);
            array_push($brands, $new_brand);
          }
          return $brands;
        }

        static function find($search_id)
        {
          $found_brand = null;
          $brands = Brand::getAll();
          foreach($brands as $brand) {
            $brand_id = $brand->getId();
            if ($brand_id == $search_id) {
              $found_brand = $brand;
            }
          }
          return $found_brand;
        }

        function update($new_brand_name)
        {
          $GLOBALS['DB']->exec("UPDATE brands SET brand_name = '{new_brand_name}' WHERE id = {$this->getId()};");
          $this->setBrandName($new_brand_name);
        }

        function delete()
        {
          $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec('DELETE FROM brands *;');
        }

        function addStore($store)
        {
          $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
        }
        function getStores()
        {
          $query = $GLOBALS['DB']->query("SELECT stores.* FROM brands JOIN stores_brands ON (brands.id = stores_brands.brand_id) JOIN stores ON (stores_brands.store_id = stores.id) WHERE brands.id = {$this->getId()};");
          $returned_stores = $query->fetchAll(PDO::FETCH_ASSOC);

              $stores = array();
              foreach($returned_stores as $returned_store){
              $name = $returned_store['name'];
              $id = $returned_store['id'];
              $new_store = new Store($name, $id);
              array_push($stores, $new_store);
              }
          return $stores;
        }

    }
?>
