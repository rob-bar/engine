<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Error - 2012-10-08 06:02:04 --> 8 - Undefined variable: select_rank in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/app/views/tourguide/_form.php on line 15
Error - 2012-10-08 06:06:12 --> 8 - Undefined variable: form in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/app/views/tourguide/edit.php on line 3
Error - 2012-10-08 12:54:38 --> 1054 - Unknown column 't0.tourguide_id' in 'where clause' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`name` AS `t0_c1`, `t0`.`email` AS `t0_c2`, `t0`.`tour_guide_id` AS `t0_c3`, `t0`.`created_at` AS `t0_c4`, `t0`.`updated_at` AS `t0_c5` FROM `visitors` AS `t0` WHERE `t0`.`tourguide_id` = '1' ] in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2012-10-08 12:58:25 --> Error - Property "tourguide_id" not found for Model_Visitor. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/model.php on line 949
Error - 2012-10-08 13:01:41 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 13:01:51 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 13:01:51 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 13:01:52 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 13:01:52 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 13:01:52 --> Error - Relation "visitor" was not found in the model. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/query.php on line 541
Error - 2012-10-08 14:03:53 --> 8 - Undefined variable: tourguides in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/app/views/tour/_form.php on line 15
Error - 2012-10-08 14:58:35 --> 2 - in_array() expects parameter 2 to be array, string given in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/app/classes/controller/tour.php on line 50
Error - 2012-10-08 14:59:14 --> Error - Property "enclosures" not found for Model_Tour. in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/packages/orm/classes/model.php on line 949
Error - 2012-10-08 15:00:00 --> 1146 - Table 'thezoo.enclosures_tours' doesn't exist [ INSERT INTO `enclosures_tours` (`tour_id`, `enclosure_id`) VALUES (1, '3') ] in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2012-10-08 15:15:52 --> 1146 - Table 'thezoo.tours_enclosures' doesn't exist [ INSERT INTO `tours_enclosures` (`tour_id`, `enclosure_id`) VALUES (2, '3') ] in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2012-10-08 16:33:01 --> 8 - Undefined variable: enclosures in /Volumes/data/Users/robbieb/Documents/REPO/prox_fuel/fuel/app/views/tour/_form.php on line 35
