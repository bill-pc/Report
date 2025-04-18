-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 13, 2025 lúc 11:37 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopmypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `user_id`, `product_id`, `quantity`, `added_at`) VALUES
(2, 1, 12, 4, '2025-04-12 15:35:57'),
(3, 1, 3, 1, '2025-04-12 16:42:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`) VALUES
(1, 'Chăm sóc da', 'tets'),
(2, 'Trang điểm', 'Trang điểm mắt, trang điểm mặt,...'),
(3, 'Chăm sóc tóc', 'Dầu gội, dầu xả, kem ủ,...'),
(4, 'Nước hoa', 'Nước hoa nam, nước hoa nữ'),
(5, 'Thực phẩm chức năng', 'Các viên uống bổ sung vitamin,...'),
(6, 'test1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `stock`, `image_url`, `category_id`, `size`) VALUES
(1, 'Xịt Khoáng Evoluderm Pure Water Spray', 'Bạn có biết rằng làn da khô ráp, xỉn màu, xuất hiện những nếp nhăn chính là những dấu hiệu báo động da đang thiếu nước trầm trọng không? Việc cung cấp nước từ bên trong vẫn chưa “xi nhê” gì đâu nhé, để “phù phép” cho làn da luôn căng mọng, tươi tắn cần có sự “trợ giúp” từ những dưỡng chất từ bên ngoài nữa.\r\n\r\nTuy nhiên, có một cách cung cấp nước và duy trì độ ẩm cho da kịp thời mà các cô nàng dù có bận rộn đến mấy cũng có thể thực hiện được, đó là nhờ vào sản phẩm xịt khoáng Evoluderm Pure Water Spray mà hôm nay shop chuẩn bị “lăng xê” với cả nhà đây.', 139000.00, 32, 'backGroundVscode.jpg', 2, '400ml'),
(2, 'Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser', 'Sữa rửa mặt Cetaphil Gentle Skin Cleanser giúp làm sạch da, loại bỏ bụi bẩn, phù hợp cho mọi loại da, không làm khô da và duy trì hàng rào bảo vệ da suốt ngày dài.\r\n\r\n+ Glycerin giúp ngăn ngừa hiện tượng khô da\r\n\r\n+ Niacinamide (B3) giúp củng cố hàng rào bảo vệ da\r\n\r\n+ Panthenol (B5) giúp làm dịu và phục hồi làn da\r\n\r\n• Công thức khoa học mới với sự kết hợp 3 thành phần lành tính: Niacinamide (Vitamin B3), Panthenol (Pro-vitamin B5) và Glycerin đã tạo ra cơ chế đặc biệt giúp thúc đẩy quá trình sản sinh Ceramides tự nhiên của da và tổng hợp Fillaggrin có tác dụng bảo vệ hàng rào tự nhiên của da giúp cải thiện khả năng phục hồi của làn da nhạy cảm.\r\n\r\n• Sản phẩm nổi bật với 6 KHÔNG: Không xà phòng, không paraben, không sulfat, không hương liệu, không dầu khoáng & không thử nghiệm trên động vật.', 229000.00, 30, '02.jpg', 1, '250ml'),
(3, 'Sữa Rửa Mặt Eucerin PH5 Facial Cleanser Sensitive Skin', 'Sữa Rửa Mặt Eucerin PH5 Facial Cleanser Sensitive Skin là dòng sữa rửa mặt hoàn toàn mới được Eucerin thiết kế dành riêng cho làn da nhạy cảm, với độ pH5 cân bằng cùng công thức 0% thành phần gây kích ứng da, giúp làm sạch sâu và cải thiện da nhạy cảm.', 215000.00, 20, '03.png', 1, '400ml'),
(4, 'Mặt Nạ Giấy Wonjin', 'Là dòng mặt nạ cao cấp đến từ thẩm mỹ viện Wonjin nổi tiếng của Hàn Quốc nghiên cứu và phát triển. Mặt nạ được sử dụng để chăm sóc chuyên sâu cho các khách hàng của thẩm mỹ viện sau các liệu trình chăm sóc da.\r\n\r\nNuty về 3 dòng:\r\n\r\n- Màu hồng: mặt nạ truyền dịch trẻ hóa da\r\n\r\n- Màu xanh dương: mặt nạ truyền HA\r\n\r\n- Màu xanh lá: mặt nạ truyền năng lượng\r\n\r\nCÔNG DỤNG:\r\n\r\n* Màu hồng:\r\n\r\n- Cung cấp độ ẩm lâu dài và dưỡng ẩm mạnh mẽ cho da\r\n\r\n- Kích thích sự tái tạo tế bào da, cải thiện nếp nhăn, nâng cơ và trẻ hoá làn da', 24000.00, 35, '04.jpg', 1, '30g'),
(5, 'Mặt Nạ JMsolution Collection Mask Disney Limited Edition', 'Bộ sưu tập JMsolution Collection Mask Disney Limited Edition là phiên bản mặt nạ giấy giới hạn kết hợp giữa hãng JMsolution và Disney - thiên đường những nhân vật hoạt hình được yêu thích toàn thế giới.\r\n\r\nMặt nạ JMsolution được mệnh danh là ???? ???? với hơn 2.5 tỷ miếng mặt nạ đã được bán ra. ', 20.00, 40, '05.jpg', 1, '30ml'),
(6, 'Bảng Phấn Mắt 9 Ô HOLD LIVE Simple Specular Light Eyeshadow Palette', 'Bảng Phấn Mắt 9 Ô Hold Live Simple Specular Light Eyeshadow Palette gồm 9 ô màu phong cách đơn giản hiện đại mà không kém phần xinh xắn từ nhà Hold Live, tiện lợi kèm gương bên trong, chất phấn mịn, dễ lên màu, phù hợp với nhiều kiểu trang điểm khác nhau.', 99000.00, 50, '06.jpg', 2, '4,8g'),
(7, 'Chì Kẻ Mày Dearmay The Chic Eyebrow Pencil', 'earmay The Chic Eyebrow Pencil là kẻ lông mày dạng chì sáp, dễ dàng tạo kiểu lông mày sắc nét đến từ Dearmay. Chất chì còn gây ấn tượng bởi độ lâu trôi, cực mịn và tự nhiên.\r\n\r\n Sản phẩm được lấy cảm hứng từ không gian thư giãn với những nốt nhạc êm dịu từ bản nhạc nhẹ, hương thơm ấm áp của tách trà nóng và nến thơm phủ đầy căn phòng. Khi sử dụng The Chic Eyebrow Pencil, bạn không chỉ làm đẹp cho chân mày mà còn tạo ra một không gian riêng, tận hưởng niềm vui mỗi ngày và yêu thương bản thân hơn.\r\n\r\n Thành phần \r\n\r\n- Thành phần dầu sáp giúp cung cấp độ ẩm và an toàn cho làn da nhạy cảm. ', 53000.00, 10, '07.jpg', 2, '0,3g'),
(8, 'Phấn Phủ Dạng Nén Kiềm Dầu The Saem Perfect Pore Powder', 'Phấn phủ kiềm dầu cho da mụn dạng bột the SAEM Saemmul Perfect Pore Powder với bột phấn siêu mịn và chiết xuất trà xanh giúp kiểm soát bã nhờn và dầu thừa để lớp trang điểm khô thoáng suốt ngày dài. Ngoài ra, phấn phủ còn có các thành phần thiên nhiên, thích hợp cho cả làn da dầu hay nhạy cảm.Giúp làn da luôn mền mịn, khô thoáng và rạng ngời.', 139000.00, 60, '08.jpg', 2, '12g'),
(9, 'Kem Nền Make Up For Ever HD Skin', 'Kem Nền Make Up For Ever HD Skin là phiên bản nâng cấp hoàn hảo của siêu phẩm Ultra HD Foundation mang đến lớp nền rạng rỡ và siêu tự nhiên. Sản phẩm có khả năng chống nước, chống mồ hôi, không lem không trôi, không dính ra khẩu trang, bền màu suốt 24h không bị xuống tông. Chất kem siêu mỏng mịn, lớp finish semi matte tạo hiệu ứng nền tự nhiên ngay cả khi không có kem lót.\r\nThiết kế: Dạng đầu pump giúp dễ dàng lấy vừa đủ lượng cần dùng. \r\nLoại da: Da thường đến da dầu ', 995000.00, 40, '09.jpg', 2, '30ml'),
(10, 'Son Kem Lì 16h Lâu Trôi Maybelline New York Super Stay Matte Ink Lipstick', 'Dịp cuối năm là mùa lễ hội với hàng loạt sân khấu ca nhạc lớn nhỏ khác nhau. Lấy cảm hứng từ không gian âm nhạc đa sắc, Maybelline mang đến Bộ sưu tập Âm nhạc (Music Collection) với vẻ ngoài hoàn toàn “lột xác” cho dòng son kem lì huyền thoại 16H lâu trôi.\r\n\r\nTháng 10 năm nay, Superstay Matte Ink mang đến 3 sắc thái MỚI với tông màu “over-hợp” cho mùa thu Đông 2023, độc quyền chỉ có trong BST Âm Nhạc:', 208000.00, 70, '10.jpg', 2, '12ml'),
(11, 'Dầu Gội Dove Tóc Phồng Dày & Ngăn Lão Hóa Hair Therapy Pro-Age All-In-1 Care Shampoo', 'Dove Hair Therapy Pro-Age All-In-1 Care Shampoo với công nghệ tiên tiến Bio-Cellular Complex thấm sâu đến tầng tế bào của tóc, giúp nuôi dưỡng và tăng cường độ ẩm cho mái tóc phồng dày, khoẻ mạnh hơn gấp 2 lần. Bên cạnh đó, sản phẩm được bổ sung thành phần Bio-Q10 giúp hỗ trợ sửa chữa và phục hồi độ ẩm chuyên sâu cho mái tóc khô xơ và lão hoá.\r\n\r\nTHÀNH PHẦN:\r\n\r\n Hợp chất Bio-Cellular Complex: dưỡng chất thấm sâu đến tầng tế bào của tóc cùng sự nuôi dưỡng vượt trội.\r\n\r\n Bio-Q10: nổi tiếng với khả năng chống oxy hoá, làm chậm quá trình lão hoá trên da và tóc.\r\n\r\nCÔNG DỤNG:\r\n\r\n- Hợp chất Bio-Cellular Complex\' + Bio-Q10 thấm sâu đến tầng tế bào của tóc, nuôi dưỡng vượt trội cho mái tóc phồng dày và chắc khỏe gấp 2 lần.', 155000.00, 20, '11.jpg', 3, '380ml'),
(12, 'Dầu Gội Dược Liệu Nguyên Xuân Sạch Gàu', 'Là dầu gội được nghiên cứu  dựa trên kinh nghiệm dân gian, kết hợp với những nghiên cứu mới của khoa học hiện đại. Nguyên Xuân kết hợp tính hoa 13 vị Dược liệu Cổ truyền như bạch quả, Hà thủ ô, Bồ kết, Mần trầu, Hoắc hương…đặc biệt bổ sung các thành phần dưỡng tóc chuyên biệt.\r\n\r\nPhù hợp với tóc nhiều gàu, ngứa', 224000.00, 40, '12.jpg', 3, '660ml'),
(13, 'Dầu Xả Dược Liệu Nguyên Xuân Từ Sữa Gạo Phục Hồi Tóc', 'Dầu xả dược liệu Nguyên xuân là sự kết hợp đột phá từ dược liệu cổ truyền và tinh chất sữa gạo giúp dưỡng tóc và phục hồi tóc chuyên sâu, cho mái tóc mềm mượt, bồng bềnh.\r\nCÔNG DỤNG: \r\n\r\n- Làm mượt tóc, giúp tóc suôn mềm, dễ chải\r\n\r\n- Giúp tóc bóng khỏe, không khô xơ, chẻ ngọn, giảm gãy rụng\r\n\r\n- Bảo vệ tóc, giảm tác hại của hóa chất (uốn, ép, nhuộm…) và môi trường.\r\n\r\n- Hương thơm dược liệu tự nhiên làm thơm tóc, tăng cảm giác thư thái.\r\n\r\n- Dùng kèm dầu gội Dược liệu Nguyên Xuân để tăng cường hiệu quả.', 56000.00, 65, '13.jpg', 3, '180ml'),
(14, 'Dầu Xả Tresemmé Keratin Smooth Vào Nếp Suôn Mượt', 'Tresemme là thương hiệu chuyên về các sản phẩm chăm sóc tóc nổi tiếng toàn thế giới. Các sản phẩm của hãng được ưa chuộng từ các salon tóc đến các sản diễn thời trang hay thảm đỏ của những nhà thiết kế chuyên nghiệp. Sản phẩm của Tresemme bao gồm dầu gội, dầu dưỡng và tạo kiểu tóc mang đến cho khách hàng trải nghiệm chăm sóc tóc “chuẩn salon” như mục tiêu của hãng khi ra mắt sản phẩm.', 165000.00, 30, '14.jpg', 3, '620g'),
(15, 'Kem Ủ Tóc Olexrs Hair Salon Argan Oil Collagen Complex Repair Mask', 'Kem Ủ Tóc Olexrs Hair Salon Argan Oil Collagen Complex Repair Mask là sản phẩm phục hồi tóc đến từ thương hiệu Olexrs có trụ sở tại Anh Quốc. Kem ủ phục hồi tóc Olexrs chiết xuất 100% từ thiên nhiên với hương thơm nhẹ nhàng hỗ trợ tái tạo tóc cho mái tóc bóng mượt chắc khỏe hơn.', 165000.00, 32, '15.jpg', 3, '500ml'),
(16, 'Nước Hoa Johnson\'s Baby', 'Hương phấn hoa, Hương ban mai, Hương mùa hè. Đã được chứng minh lâm sàng về độ dịu nhẹ, không gây kích ứng da bé, có thể dùng trên da hoặc trên quần áo. Dùng được cho mọi độ tuổi, kể cả người lớn', 45000.00, 45, '16.jpg', 4, '50ml'),
(17, 'Xịt Thơm Toàn Thân Hương Nước Hoa Malissa Kiss Hương Fress Escape', 'Công thức “Perfume Mist\" dựa trên nguyên lý xây dựng một nước hoa  với nồng độ tương đương  Eau De Toillet ( EDT) với nồng độ tinh dầu nước hoa 6%\r\nTinh dầu  nước hoa được R&D (Nghiên cứu) độc quyền tại phòng lab độc lập của công ty là KT lab (Thailand).\r\nMùi hương của từng loại Mist là hương nước hoa đậm đặc hơn Body Lotion (hiện tại là 2%), giúp mùi hương lotion sẽ thơm lâu đến 8 tiếng.', 84000.00, 34, '17.jpg', 4, '88ml'),
(18, 'Set Nước Hoa 3 Món Lancome Idôle Eau De Parfum', 'Cho mùa lễ năm nay, Lancôme đã thiết kế một hộp quà phiên bản giới hạn với thiết kế tinh xảo và sang trọng để làm mới hình ảnh của hoa hồng Lancôme.\r\n\r\nSet quà tặng bao gồm:\r\n\r\n - Nước hoa Idôle Eau de Parfum 50ml\r\n\r\n- Nước hoa Idôle Eau de Parfum 10ml\r\n\r\n- Dưỡng thể body Idole 50ml', 2100000.00, 45, '18.jpg', 4, '50ml'),
(19, 'Nước Hoa De Memoria Perfume', 'Tuy mới xuất hiện vào năm 2021 nhưng De Memoria đã nhanh chóng trở thành thương hiệu nước hoa được ưa chuộng trong nội địa Hàn Quốc. Cùng với tài năng của nhà sáng lập Jennifer Jambon, De Memoria đã thành công cho ra mắt 6 mùi hương vô cùng tinh tế và sang trọng. Jennifer Jambon và De Memoria đều cho rằng điều quan trọng nhất trong mỗi công thức nước hoa là phải mang đậm tính độc đáo và giữ được sự tinh khiết nhất của những nguyên liệu đến từ tự nhiên.\r\n', 350000.00, 12, '19.jpg', 4, '30ml'),
(20, 'Nước Hoa Carolina Herrera Good Girl Supreme', '“Nàng vẫn là nàng, vẫn đôi chân lả lướt quen thuộc, nhưng giờ đây lấp lánh và sáng rực hơn thế nữa. Nàng lột xác ngoạn mục và sải chân kiêu hãnh của nàng ở khắp mọi nơi.”\r\n\r\nDưới tạo hình chiếc guốc cao gót đầy kiêu kỳ, Carolina Herrera Good Girl Supreme như trở lại với sàn đua và khiến cả khán phòng phải sững người vì vẻ đẹp lấp lánh của cô nàng. Mướt mát đầy ngọt ngào, Good Girl Supreme ve vãn ánh nhìn của mình dưới sự hòa quyện của Quả mọng nhiệt đới và Hoa nhài.\r\n\r\nTự điểm xuyến thêm phần quyến rũ, Hoa huệ và Đậu tonka như tấm áo quấn chặt lấy phom dáng đầy đặn của người phụ nữ, tôn lên những gì tuyệt hảo nhất bằng mùi hương ngọt ngào miên man. Để rồi dành dụm Gỗ vetiver ở tầng hương cuối như níu giữ ánh nhìn của đối phương, tất nhiên vẫn theo cách của cô nàng, tuy bất cần nhưng vẫn đáng để yêu.', 3200000.00, 9, '20.jpg', 4, '80ml'),
(21, 'Viên Uống Chống Nắng Fine Japan UV Care Plus', 'Bên cạnh việc bôi kem chống nắng chúng ta cần bảo vệ làn da bằng cách chống nắng từ bên trong nữa nha. Viên Uống Chống Nắng Fine Japan là sản phẩm phù hợp với người thường xuyên hoạt động ngoài trời, da yếu cần được bảo vệ. \r\n\r\nThành phần\r\n\r\n- Chiết xuất từ thành phần chính là quả dứa chứa nhiều Ceramide, cùng Vitamin E, glycerin...  hỗ trợ chống nắng, bảo vệ da khỏi tác hại của tia UV gây ra.\r\n\r\n- Vitamin E còn giúp tăng cường sức sống cho da, ngăn ngừa gốc tự do gây hại, ngăn chặn nguy cơ bị bong tróc, khô ráp mất nước, sạm đen và hình thành nám, tàn nhang, bên cạnh đó còn giúp da mịn màng, đủ ẩm, mềm mại. ', 199000.00, 50, '21.jpg', 5, '30vien'),
(22, 'Viên Uống DHC Bổ Sung Vitamin C', 'Duy trì thanh xuân từ làn da đến sức khỏe mỗi ngày với Viên Uống DHC Bổ Sung Vitamin C.\r\n\r\nTự tin trẩy hội với làn da trắng mịn, hồng hào rạng rỡ và săn chắc như gái đôi mươi luôn đó các nàng. Triển em này nhanh thôi nào!', 215000.00, 20, '22.png', 5, '90vien'),
(23, 'Viên Uống Trắng Da DHC', 'Viên uống trắng da DHC là phương pháp làm sáng và đều màu da từ bên trong, đảm bảo an toàn với da và sức khỏe nhờ chứa các thành phần có chiết xuất tự nhiên. Trong đó thành phần chính là chiết xuất hạt Coix hay còn gọi là ý dĩ là một dược liệu quý chứa các thành phần hóa học bao gồm: Carbonhydrat, chất béo, protid, coixenolid, monolinolein và các loại axit amin khác. Thành phần này có tính năng thải độc cơ thể đồng thời ngăn chặn quá trình hình thành melamin, tác nhân gây nám da giúp da trắng mịn, tươi sáng và căng tràn sức sống. ', 199000.00, 30, '23.jpg', 5, '30vien'),
(24, 'Viên Uống Rau Củ DHC Perfect Vegetable Premium Japanese Harvest', 'Viên Uống DHC Rau Củ Quả Tổng Hợp đặc biệt phù hợp cho những người bận rộn, không có thời gian ăn uống đủ chất, hay những người ghét và lười ăn rau. Sản phẩm dạng viên uống giúp bạn dễ dàng mang theo khi đi làm hay đi du lịch.\r\n\r\nĐối tượng sử dụng:\r\n- Người bận rộn khó bổ sung rau xanh vào bữa ăn hàng ngày\r\n- Người hay bị táo bón, nổi mụn\r\n- Người ăn kiêng, người chỉ ăn được một hoặc 1 vài loại rau\r\n- Người lười hoặc ghét ăn rau', 550000.00, 20, '24.jpg', 5, '90vien'),
(25, 'Viên Uống Hỗ Trợ Giảm Cân Bổ Sung Dầu Da DHC', 'Trong mỗi viên uống giảm cân DHC Forskohlii Soft Capsule, DHC gửi gắm hàm lượng bột húng chanh Ấn Độ cao giúp cơ thể giảm hấp thu chất béo, tích trữ mỡ thừa trong các lớp cơ.\r\n\r\nĐồng thời mỗi viên uống DHC giảm cân còn tác động tới cơ thể làm giảm cảm giác thèm ăn, đảm bảo cơ thể không nạp dư năng lượng cần thiết.\r\n\r\nBên cạnh đó, 200mg dầu dừa ẩn chứa bên trong mỗi viên uống phát huy khả năng cấp ẩm cho da, giảm tình trạng da chảy xệ và nhão do quá trình xuống cân.\r\n\r\nKhông những vậy, viên uống giảm cân DHC còn giúp bảo toàn bề mặt da mịn màng, săn chắc cho người dùng. ', 280000.00, 30, '25.png', 5, '30vien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
(1, 'duc@gmail.com', '$2y$10$9RVgyS3S3QCV4uszB3g3aOt110c9tO8s2Hti8FN1R9oLTeFAZWj8W', 'user'),
(2, 'duc1@gmail.com', '$2y$10$J9K8/mGlTRlatTASFniCwemrBxTrv3CkovWOVfPZMKFoCbqFQ0iOy', 'user'),
(3, 'duc2@gmail.com', '$2y$10$QkGiVYk1S6McHnGrg5g/0OkS468U9hfniuzyoSGN5kqS1bWDBBKEK', 'user'),
(4, 'duc3@gmail.com', '$2y$10$IDRxZr3BZ.bPjVToDX1lkeDbphucjVprxpY5RChyk.BxIgotanXwS', 'user'),
(5, 'admin@gmail.com', '$2y$10$RhTLnALlopLy/ycMjEW0Ker0W7fM6ICaOzgYRn25GfcndXwkqc56y', 'admin'),
(6, 'truyen@gmail.com', '$2y$10$grtRKM1oon5DiS6/McYhQuVgx8Vl0hiqJ3MKgqvxvE8GCpnoDOIzq', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
