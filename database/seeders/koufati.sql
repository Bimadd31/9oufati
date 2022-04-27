
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address_line1`, `address_line2`, `city`, `postal_code`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imad', 'El Hassnaoui', 'imadox.paris@hotmail.com', '$2y$10$i9qAYuv6l.wyqnczG4IhqOtB3NNyqnqkaZoy41J4.LaV2JLS/3VcK', '0634738877', NULL, NULL, NULL, NULL, 'client', 1, NULL, NULL, '2022-04-27 22:45:30', '2022-04-27 22:45:30');


INSERT INTO `Category` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'FRUITS', '', '/img/category-img/fruits-bg.jpg', NULL, NULL),
(2, 'LEGUMES', '', '/img/category-img/legumes-bg.jpg', NULL, NULL),
(3, 'EPICES', '', '/img/category-img/epices-bg.jpg', NULL, NULL),
(4, 'HERBE', '', '/img/category-img/herbe-bg.jpg', NULL, NULL),
(5, 'PANIER', '', '', '2022-04-09 17:30:55', NULL);


INSERT INTO `discounts` (`id`, `name`, `desc`, `percent`, `active`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 'DISCOUNT15', '', 15, 1, '2022-04-27 11:03:00', '2022-04-28 10:24:21', '2022-04-25 10:24:21', NULL);


INSERT INTO `baskets` (`id`, `name`, `desc`, `image`, `type`, `price`, `active`, `stock`, `order_id`, `user_id`, `category_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(2, 'Couscous panier', NULL, '/img/product-img/basket.jpg', 'fixed', 250, 1, 5, NULL, NULL, 5, NULL, '2022-04-19 22:35:35', NULL),
(3, 'El Hassnaoui \'s basket', NULL, NULL, 'custom', NULL, 1, NULL, NULL, 1, 5, NULL, '2022-04-27 22:45:30', '2022-04-27 22:45:30');


INSERT INTO `products` (`id`, `name`, `desc`, `image`, `mesure_unit`, `min_quantity`, `stock`, `sell_price`, `buy_price`, `buy_quantity`, `active`, `category_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 'orange - برتقال', '', '/img/product-img/orange.png', 'kg', 1, 20, 8, 5, 20, 1, 1, NULL, '2022-04-02 00:56:46', NULL),
(2, 'peche - خوخ', '', '/img/product-img/peche.png', 'kg', 1, 10, 9.5, 7, 10, 1, 1, NULL, '2022-04-02 00:59:26', NULL),
(3, 'banane - موز', '', '/img/product-img/banane.png', 'kg', 1, 0, 5, 3, 30, 1, 1, NULL, '2022-04-02 00:59:26', NULL),
(4, 'Carotte - جزرة', '', '/img/product-img/carotte.jpg', 'kg', 1, 10, 9.5, 5, 10, 1, 2, NULL, '2022-04-09 00:03:47', NULL);

INSERT INTO `basket_details` (`basket_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 4, '2022-04-19 22:41:28', NULL),
(2, 3, 3, '2022-04-19 22:40:55', NULL);