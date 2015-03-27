<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    require_once "src/Store.php";
    // require_once 'src/Brand.php';

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            // Brand::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = 'John';
            $id = null;
            $test_store = new Store($name, $id);
            //Act
            $result = $test_store->getName();
            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            $name = 'John';
            $id = null;
            $test_store = new Store($name, $id);
            $test_store->setName('Anthony');
            $result = $test_store->getName();
            $this->assertEquals('Anthony', $result);
        }

        function test_getId()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $result = $test_store->getId();
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->setId(3);
            $result = $test_store->getId();
            $this->assertEquals(3, $result);
        }

        function test_save()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();
            $result = Store::getAll();
            $this->assertEquals([$test_store], $result);
        }

        function test_find()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();
            $name2 = 'Jim';
            $id2 = 2;
            $test_store2 = new Store($name2, $id2);
            $test_store2->save();
            $result = Store::find($test_store->getId());
            $this->assertEquals($test_store, $result);
        }

        function test_update()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();
            $new_name = 'Maggie';
            $test_store->update($new_name);
            $this->assertEquals(['Maggie'], [$test_store->getName()]);
        }
        
        function test_delete()
        {
            $name = 'John';
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();
            $test_store->delete();
            $result = Store::getAll();
            $this->assertEquals([], $result);
        }
    }

?>
