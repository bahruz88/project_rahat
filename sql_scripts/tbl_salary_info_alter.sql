ALTER TABLE `tbl_salary_info` ADD `insert_date` date   NOT NULL AFTER `status`;
ALTER TABLE `tbl_salary_info` ADD `update_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `status`;