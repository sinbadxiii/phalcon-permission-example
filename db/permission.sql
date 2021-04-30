CREATE TABLE `roles` (
                         `id` int NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `guard_name` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NOT NULL,
                         `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, '2021-03-25 02:12:37', '2021-03-25 02:12:37'),
(2, 'Manager', NULL, '2021-03-25 02:12:37', '2021-03-25 02:12:37'),
(3, 'Content', NULL, '2021-03-25 02:12:59', '2021-03-25 02:12:59');

ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

ALTER TABLE `roles`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

-----------------------------------------------------------------------------------

CREATE TABLE `users_roles` (
                               `id` int NOT NULL,
                               `user_id` int NOT NULL,
                               `role_id` int NOT NULL,
                               `created_at` timestamp NOT NULL,
                               `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-03-26 06:28:48', '2021-03-26 06:28:48'),
(3, 2, 1, '2021-04-29 13:03:44', '2021-04-29 13:03:44');

ALTER TABLE `users_roles`
    ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `users_roles`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

-----------------------------------------------------------------------------------

CREATE TABLE `permissions` (
                               `id` int NOT NULL,
                               `role_id` int NOT NULL,
                               `resource_id` int NOT NULL,
                               `action_id` int NOT NULL,
                               `created_at` timestamp NOT NULL,
                               `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `permissions` (`id`, `role_id`, `resource_id`, `action_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 8, '2021-04-29 12:34:01', '2021-04-29 12:34:01'),
(10, 2, 2, 9, '2021-04-29 12:35:48', '2021-04-29 12:35:48'),
(11, 2, 3, 10, '2021-04-29 12:50:50', '2021-04-29 12:50:50');


ALTER TABLE `permissions`
    ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `action_id` (`action_id`);

ALTER TABLE `permissions`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

---------------------------------------------------------------------------

CREATE TABLE `resources` (
                             `id` int NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `description` varchar(255) NOT NULL,
                             `created_at` timestamp NOT NULL,
                             `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `resources` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin controller', '2021-03-30 06:55:10', '2021-03-30 06:55:10'),
(2, 'orders', 'Orders Controller', '2021-03-30 07:07:44', '2021-03-30 07:07:44'),
(3, 'products', 'Products COntroller', '2021-03-30 07:16:34', '2021-03-30 07:16:34');

ALTER TABLE `resources`
    ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`) USING BTREE;

ALTER TABLE `resources`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

----------------------------------------------------------------------------

CREATE TABLE `resources_actions` (
                                     `id` int NOT NULL,
                                     `resource_id` int NOT NULL,
                                     `name` varchar(255) NOT NULL,
                                     `created_at` timestamp NOT NULL,
                                     `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `resources_actions` (`id`, `resource_id`, `name`, `created_at`, `updated_at`) VALUES
(8, 1, 'index', '2021-04-29 12:32:59', '2021-04-29 12:32:59'),
(9, 2, 'index', '2021-04-29 12:35:36', '2021-04-29 12:35:36'),
(10, 3, 'index', '2021-04-29 12:50:19', '2021-04-29 12:50:19'),
(11, 3, 'show', '2021-04-29 12:50:19', '2021-04-29 12:50:19');

ALTER TABLE `resources_actions`
    ADD PRIMARY KEY (`id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `name` (`name`);

ALTER TABLE `resources_actions`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;