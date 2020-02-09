--
-- Add new tab
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES
('job-contact', 'job-single', 'Contact', 'Shipping & Billing', 'fas fa-user', '', '1', '', '');

--
-- Add new partial
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'partial', 'Contact', 'job_contact', 'job-contact', 'job-single', 'col-md-12', '', '', '0', '1', '0', '', '', ''),
(NULL, 'hidden', 'Contact', 'contact_idfs', 'job-base', 'job-single', 'col-md-3', '', '', '0', '1', '0', '', '', '');