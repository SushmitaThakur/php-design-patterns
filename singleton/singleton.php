<?php

/**
 * Singleton Pattern 
 * Class has only one instance, while providing a global access point to this instance
 * Make default constructor private
 * Create a static creation method
 */

 include "db_connection.php";

 $object1 = DBConnection::getInstance();
 $object2 = DBConnection::getInstance();
 $object3 = DBConnection::getInstance();
