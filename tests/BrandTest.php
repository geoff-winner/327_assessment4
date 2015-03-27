<?php
    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');
    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */
    require_once "src/Brand.php";
    require_once "src/Store.php";

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_getBrandName()
        {
            //Arrange
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            //Act
            $result = $test_brand->getBrandName();
            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function test_setBrandName()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->setBrandName('Nike');
            $result = $test_brand->getBrandName();
            $this->assertEquals('Nike', $result);
        }

        // function test_getSize()
        // {
        //     $brand_name = 'Docks';
        //     $size = 5;
        //     $id = 1;
        //     $test_brand = new Brand($brand_name, $size, $id);
        //     $result = $test_brand->getSize();
        //     $this->assertEquals($size, $result);
        // }
        //
        // function test_setSize()
        // {
        //     $brand_name = 'Docks';
        //     $size = 5;
        //     $id = 1;
        //     $test_brand = new Brand($brand_name, $size, $id);
        //     $test_brand->setSize(6);
        //     $result = $test_brand->getSize();
        //     $this->assertEquals(6, $result);
        // }

        function test_getId()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $result = $test_brand->getId();
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->setId(3);
            $result = $test_brand->getId();
            $this->assertEquals(3, $result);
        }

        function test_save()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();
            $result = Brand::getAll();
            $this->assertEquals($test_brand, $result[0]);
        }

        function test_find()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = 'Nike';
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            $result = Brand::find($test_brand->getId());

            $this->assertEquals($test_brand, $result);
        }

        function test_update()
        {
            $brand_name = 'Docks';
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $new_brand_name = 'Nikes';

            $test_brand->update($new_brand_name);
            $this->assertEquals(['Nikes'], [$test_brand->getBrandName()]);
        }

        function test_addStore()
        {
            $name = 'Docks';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();

            $name2 = 'Nike';
            $id2 = 2;
            $test_store2 = new Store($name2, $id2);
            $test_store2->save();

            $brand_name = 'John';
            $id3 = 3;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);
            $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
        }

    }
?>
