ALTER TABLE `tbl_employee_prev_positions` ADD `status` INT NOT NULL DEFAULT '1' AFTER `update_user`;
ALTER TABLE `tbl_employee_prev_positions` CHANGE `insert_date` `insert_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;