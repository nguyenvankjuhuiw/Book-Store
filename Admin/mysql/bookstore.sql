-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2024 lúc 04:20 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `addressid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `ward` varchar(200) NOT NULL,
  `addressdetail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `genreid` int(11) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantitysale` int(11) NOT NULL,
  `costprice` int(11) NOT NULL,
  `saleprice` int(11) NOT NULL,
  `distributor` varchar(200) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `translator` varchar(200) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`bookid`, `genreid`, `bookname`, `quantity`, `quantitysale`, `costprice`, `saleprice`, `distributor`, `publisher`, `author`, `translator`, `year`, `size`, `pages`, `weight`, `description`, `image`) VALUES
(1, 9, 'Nếu Một Đêm Đông Có Người Lữ Khách', 85, 10, 110000, 130500, '\r\nNhã Nam', 'Nhà Xuất Bản Văn Học', 'Italo Calvino', 'Trần Tiễn, Cao Đăng', NULL, '20.5 x 14 x 2 cm', 404, 500, 'Nếu Một Đêm Đông Có Người Lữ Khách (Tái Bản 2023)\r\n\r\nMột cái kết mở thì rất nhiều nhà văn giỏi đã làm, nhưng một cái mở không tiến lên, thậm chí không kết, thì hình như chỉ một người như Italo Calvino mới dám biến thành trò chơi tiểu thuyết của mình. Làm cho một cuốn tiểu thuyết “đi tới” trong sự tiến triển hợp lý và đẹp đã là khó, nhưng giữ cho một cuốn tiểu thuyết hoàn chỉnh đứng yên ở ngưỡng bắt đầu còn khó hơn nhiều lần.\r\n\r\nNếu một đêm đông có người lữ khách nhốt câu chuyện ngập ngừng trong vẻ tươi mới của sự khởi đầu trong suốt mấy trăm trang sách, buộc người đọc liên tục hào hứng với không ngớt những bước chân đầu tiên, dự cảm đầu tiên, đoán định đầu tiên. Cuốn tiểu thuyết từ khi ra đời đã giữ chân bao độc giả lòng vui sướng thỏa mãn ở ngay điểm xuất phát, và cũng là nguồn khai thác dồi dào cho không ít lý thuyết gia văn học nhìn thấy ở đây một trò chơi tài tình và một suy tư sâu sắc về bản chất của tiểu thuyết và văn chương.\r\n\r\nTÁC GIẢ:\r\nItalo Calvino (1923-1985) là một trong những nhà văn lớn nhất thế kỷ XX của Ý. Năm 1947 ông đã xuất bản tiểu thuyết đầu tay, Il sentiero dei nidi di ragno (Lối đi mạng nhện). Phần lớn tác phẩm của Calvino là kiệt tác: nhóm tiểu thuyết về thời quá khứ với tên gọi chung “Tổ tiên của chúng ta”, Il Visconte dimezzato (Tử tước chẻ đôi, 1952), Il Barone rampante (Nam tước trên cây, 1957) và Il Cavaliere inesistente (Hiệp sĩ không hiện hữu, 1959); Cosmicomics (1965); Những thành phố vô hình (1972), và đặc biệt là Nếu một đêm đông có người lữ khách… (1979). Calvino còn là một nhà phê bình rất tên tuổi với khối lượng trước tác đồ sộ.\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/54/91/78/ffd6d08bd83b2fbbe9e34649bca31aa3.jpg.webp'),
(2, 45, 'Sách Excel Power Query và Power Pivor tự động hóa dữ liệu báo cáo cơ bản đào tạo tin học có kèm video khóa học', 98, 2, 160000, 178600, 'DAOTAOTINHOCVN', 'NHÀ XUẤT BẢN THÔNG TIN VÀ TRUYỀN THÔNG', 'Nguyễn Quang Vinh', NULL, NULL, '4,5cm x 20,5cm', NULL, NULL, '- Sách Excel Power Query - Power Pivot tự động hóa dữ liệu báo cáo cơ bản là cuốn sách tuyệt vời để giúp bạn giải quyết các công việc về báo cáo tiện lợi hơn và nhanh chóng\r\n- MỘT SỐ ĐIỀU NỔI BẬT CỦA SẢN PHẨM\r\n+ Phương pháp học tập đúng chuẩn có hệ thống được đúc kết từ giảng viên có kinh nghiệm trong lĩnh vực đào tạo TIN HỌC VĂN PHÒNG\r\n+ Bộ SÁCH được in màu dễ nhìn cùng chất lượng giấy in cao cấp giúp người đọc cảm giác thoải mái, dễ dàng trong việc học\r\n+ SÁCH EXCEL POWER QUERY sẽ có kèm theo tài liệu bài tập thực hành để bạn có thể tự học theo lộ trình của cuốn sách giúp trải nghiệm khi tự học tại nhà.\r\n+ Đội ngũ hỗ trợ của DAOTAOTINHOCVN đồng hành cùng bạn chinh phục cuốn SÁCH EXCEL POWER PIVOT này.', 'https://salt.tikicdn.com/cache/750x750/ts/product/08/ea/e9/e86c8e6593db2bfa30441bd01955ec60.jpg.webp'),
(3, 45, 'Sách - Combo Sách Ôn Thi 2 Môn MOS Excel, Word, Powerpoint 2016 Specialist, Ứng dụng Tin học văn phòng cơ bản ', 99, 1, 500000, 549000, 'NXB Thanh Niên', 'Nhà Xuất Bản Thanh Niên', NULL, 'Trung tâm tin học MOS - tinhocmos', '2019', NULL, 150, NULL, 'TINHOCMOS xin trân trọng giới thiệu Combo KHOÁ CHỨNG CHỈ MOS 2 MÔN (EXCEL, WORD, POWERPOINT) đến với độc giả.\r\nNhằm giúp người học tự tin vượt qua bài thi MOS cũng như làm chủ được kiến thức cơ bản từ các công cụ: Microsoft Word, Excel  Powerpoint. Tinhocmos ra mắt sản phẩm combo ôn thi 2 môn MOS Excel, Word, Powerpoint. Sản phẩm bao gồm: 02 cuốn giáo trình với cấu trúc, nội dung rõ ràng, hệ thống bài bản được viết bởi tác giả đã có nhiều kiến thức, kinh nghiệm; 02 cuốn bộ đề song ngữ giúp người học có thể tập luyện và thực hành cùng file thực hành tương ứng.\r\n\r\nĐặc biệt, đi kèm với đó là đội ngũ hỗ trợ của Tinhocmos luôn sẵn sàng giải đáp thắc mắc và tư vấn cho bạn 16/24.\r\n', 'https://salt.tikicdn.com/cache/750x750/ts/product/92/bd/ea/f0be1e9cb36395978c8bc3169cab1557.png.webp'),
(4, 45, 'Microsoft Office Word 2016', 96, 3, 60000, 71800, 'Bộ Phận SX-XB Cty Fahasa', 'Nhà Xuất Bản Tổng hợp TP.HCM', NULL, NULL, NULL, NULL, NULL, NULL, 'Microsoft Office Word 2016\r\n\r\nIIG Việt Nam - Đại diện chính thức & duy nhất của tổ chức Khảo thí Certiport và Viện Khảo thí Giáo dục Hoa Kỳ ( ETS) tại Việt Nam chuyên cung cấp các bài thi:\r\n\r\n- Tin học quốc tế: MOS (Microsoft Office Specialist), IC3 (Internet and Computing Core Certification), ACA (Adove Certified Associate) , MTA (Microsoft Techonology Associate).\r\n\r\n- Tiếng Anh quốc tế: TOEIC Speaking & Writing, TOEIC Listening & Reading, TOEIC Bridge, TOEFL ITP, TOEFL iBT, TOEFL Junior, TOEFL Primary, SAT, GRE tại Việt Nam.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/41/91/64/5fe7a77e41728b41c59b1af04a81b2f5.jpg.webp'),
(5, 45, 'Sách Thành thạo các hàm Excel phổ biến nhất', 5, 4, 145000, 159000, 'Viện kinh tế và thương mại quốc tế (iEIT)', 'Nhà Xuất Bản Thanh Niên', NULL, '', '2021', NULL, 188, NULL, 'CÂU CHUYỆN NHỎ\r\n\r\nVới hơn 2830+ học viên,cộng đồng 37500+ thành viên thảo luận về tin học văn phòng, Tinhocmos thường nhận 10 -15 câu hỏi/ngày, liên quan đến Hàm Excel từ cơ bản đến phức tạp. Tựu chung lại, các bạn thường gặp 5 vấn đề sau:\r\n\r\nThiếu hướng xử lý tìm lỗi và giải pháp khắc phục khi phát sinh lỗi.\r\nKhông biết gọi tên, tìm kiếm và sử dụng hàm nào để giải quyết cho vấn đề của mình.\r\nKhông thể chủ động phát triển và tra soát các bước của hàm.\r\nSố lượng hàm nhiều nên rất khó để học thuộc.\r\nCác tài liệu hướng dẫn nhiều nhưng rời rạc, chỉ phù hợp với người đã có nền tảng; ngoài ra ví dụ, văn phong và tình huống chưa sát với người Việt.\r\nTừ việc hỗ trợ các bạn liên tục qua nhiều năm, Tinhocmos suy nghĩ rằng, nếu chỉ trả lời mà không cung cấp các bạn một lộ trình tiếp cận hàm đúng hướng thì học viên rồi cũng đi theo lối mòn kinh nghiệm. Vì vậy Tinhocmos quyết định biên soạn ấn phẩm Thành thạo các Hàm Excel phổ biến nhất nhằm giúp các bạn\r\n\r\nTiếp cận hàm đúng hướng, đọc vấn đề, tìm đúng hàm và sử dụng một cách chủ động, mở rộng và sửa chữa lỗi xuất hiện trong quá trình thao tác và thực hiện công việc liên quan đến hàm excel\r\nNắm bắt được các lỗi sai thường gặp khi sử dụng hàm\r\nBiết cách truy lỗi và điều chỉnh, khắc phục lỗi khi sử dụng hàm.\r\nTư duy phát triển và kết hợp hàm.\r\nĐIỀU THÚ VỊ CHÚNG TÔI MUỐN BẠN KHÁM PHÁ \r\n\r\nMột phương pháp học tập đúng chuẩn Microsoft có hệ thống, đơn giản và Việt hóa - từ ví dụ đến file thực hành.\r\nCuốn sách là \"tấm bản đồ tra cứu\" khi bạn gặp rắc rối, bế tắc khi sử dụng hàm.\r\nBiết cách tư duy đúng khi tìm và sử dụng hàm.\r\nNắm bắt được các lỗi sai thường gặp khi sử dụng hàm.\r\nVí dụ minh họa bằng video - học tập không căng thẳng.\r\nĐội ngũ hỗ trợ đồng hành cùng bạn.\r\nKết lại\r\n\r\nCuốn sách “Thành thạo các hàm Excel phổ biến nhất” với 60+  tiếp cận theo các hàm và hơn 100+ video mở rộng, cùng với cộng đồng hỗ trợ, giúp bạn Học từ gốc - Tạm biệt rắc rối hàm Excel. Hãy là người học thông thái, học ít nhưng chất lượng. Tinhocmos không chỉ giúp bạn biết cách sử dụng hàm Excel, mà còn giúp bạn hiểu sâu và tự tin sử dụng hàm mà không cần phải ghi nhớ quá nhiều.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/e2/00/f9/73fc83d0d8e3d18572a7dab708279b8f.png.webp'),
(6, 45, 'Tự Học Nhanh Microsoft Office-Microsoft Office Dành Cho Người Bắt Đầu', 96, 3, 100000, 128700, 'Công Ty TNHH Thương Mại STK', 'Nhà Xuất Bản Thanh Niên', NULL, NULL, '2021', '16 x 24 cm', 440, NULL, 'Chúc mừng bạn đến với tủ sách STK qua bộ sách “HƯỚNG DẪN SỬ DỤNG-MICROSOFT OFFICE”, một chương trình tin học văn phòng đầy quyền năng. Trong lĩnh vực tin học văn phòng, Microsoft Word, Excel, PowerPoint, Visio là những chương trình thuộc bộ Microsoft Office đã và đang được ứng dụng rộng rãi trong nhiều lĩnh vực: Kinh tế, kế toán, thương mại, quản lý, vẽ kỹ thuật và nhiều hơn nữa. Với Microsoft Office, bạn có trong tay đầy đủ các công cụ và lệnh để thực hiện các tiện ích trong điện toán văn phòng. Tại Việt Nam, Microsoft Office rất phổ biến. Tuy rất phổ cập và có nhiều sách trình bày cách sử dụng Microsoft Office, nhưng để có được tài liệu tự học kiểu “Xem tới đâu thực hành tới đó” giúp người đọc có thể tự tham khảo và thực hành ứng dụng vào trong thực tế thì không nhiều. Nội dung sách trình bày những kiến thức không quá sâu, nhằm phục vụ cho những người mới bắt đầu làm quen với việc soạn thảo văn bản (Word), bảng tính (Excel), trình chiếu (PowerPoint) và vẽ kỹ thuật (Visio), đồng thời là tài liệu tham khảo chương trình Microsoft Office cho giáo viên, học sinh tại các trung tâm, trường học. Bố cục cuốn sách gồm bốn phần:\r\n\r\nPHẦN 1: HƯỚNG DẪN SỬ DỤNG MICROSOFT WORD\r\n\r\nBài tập 1: Thiết lập định dạng văn bản.\r\nBài tập 2: Những chức năng hiệu chỉnh.\r\nBài tập 3: Tạo Textbox-Table và Chart.\r\nBài tập 4: Tìm kiếm - Thay thế - Kiểm tra lỗi - Mail Merge.\r\nBài tập 5: Hiển thị - In.\r\nBài tập 6: Những lỗi thường gặp khi soạn thảo văn bản.\r\nBài tập 7: Mẹo hay trong Word.\r\nPHẦN 2: HƯỚNG DẪN SỬ DỤNG MICROSOFT POWERPOINT\r\n\r\nBài tập 8: Thực hành với Powerpoint.\r\nLàm quen với PowerPoint.\r\nHướng dẫn thiết kế bài giảng hóa học.\r\nỨng dụng thiết kế bài giảng của PowerPoint.\r\nPHẦN 3: HƯỚNG DẪN SỬ DỤNG MICROSOFT EXCEL\r\n\r\nBài tập 9: Tổng quan về Excel.\r\nBài tập 10: Hàm trong Excel.\r\nBài tập 11: Đồ thị trong Excel.\r\nBài tập 12: Bài tập Excel.\r\nPHẦN 4: HƯỚNG DẪN SỬ DỤNG MICROSOFT VISIO\r\n\r\nBài tập 13: Làm quen với Visio.\r\nBài tập 14: Vẽ mô hình tổ chức công ty.\r\nBài tập 15: Vẽ sơ đồ quy trình sản xuất.\r\nBài tập 16: Vẽ sơ đồ quy trình sản xuất công ty.\r\nPHẦN 5: LẬP TRÌNH VBA\r\n\r\nLập trình VBA với PowerPoint.\r\nLập trình VBA với Excel.\r\nMột số điểm cần lưu ý khi sử dụng sách:\r\n\r\nNếu máy tính của bạn dùng phiên bản Microsoft Office cũ hơn như 2007, 2010 hay mới hơn 2016, 2017, 2019 vẫn có thể thực hành các bài tập trong sách do giao diện làm việc giữa các phiên bản này không khác nhau nhiều. Hãy tải về một số file thực hành trong sách theo đường dẫn sau:\r\n\r\nHy vọng các bạn sẽ nhanh chóng khai thác có hiệu quả bốn chương trình này trong công việc của mình.\r\n\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/51/6a/30/ee8ac31ecdfa53782957a38bbb39d83a.jpg.webp'),
(7, 9, 'Vạn dặm đường từ một bước chân', 99, 1, 120000, 135150, 'Công Ty TNHH Văn Hóa Và Truyền Thông Skybooks Việt Nam', 'Nhà Xuất Bản Phụ Nữ Việt Nam', 'Mavis ViVu Ký', NULL, '2024', '14,5 x 20,5 cm', 248, 500, 'VẠN DẶM ĐƯỜNG TỪ MỘT BƯỚC CHÂN - HÀNH TRÌNH 6 NĂM ĐI KHẮP 63 TỈNH THÀNH VIỆT NAM\r\n\r\n“Vạn dặm đường từ một bước chân” là hành trình của Mavis Vi Vu Ký khám phá 63 tỉnh thành Việt Nam trong 6 năm. Bạn có thể tìm thấy trong 248 trang sách một  Mavis ngây ngô, háo hức trước những điều mới lạ, nhưng theo dòng thời gian, trải qua nhiều sự kiện cũng như thử thách dần trở nên độc lập và mạnh mẽ hơn.\r\n\r\nTừng vùng đất trên đất nước hình chữ S hiện lên rất thực và đời dưới góc nhìn của Mavis Vi Vu Ký. Một Pleiku sống động với hàng thông là biển hồ chè rộng lớn, những luống chè xanh ngát nối đuôi nhau trải dài bất tận cùng đập Tân Sơn, ngắm nhìn mặt nước xanh phẳng lặng, bình yên; Hoàng hôn Tà Xùa cũng rất đẹp, lý tưởng bậc nhất có lẽ là ngắm từ khu vực Đỉnh Gió hay Thái Nguyên với nhiều con thác đẹp như tranh với cảnh sắc yên bình và ngoạn mục. Và vô vàn cảnh sắc tươi đẹp khác của thiên nhiên Việt Nam.\r\n\r\nTrong hành trình khám phá thiên nhiên đất nước và thế giới nội tâm của chính mình, Mavis cũng có những chuyện dở khóc dở cười như da từng bị cháy nắng dưới nắng gió khắc nghiệt của miền biển; thủng săm xe giữa rừng ngay ở nơi có bảng “khu vực thường có voi rừng xuất hiện”; lạc vào những con đường vô cùng lạ lẫm; xích mích với bạn đồng hành, mỗi người chọn một hướng đi riêng… để từ đó cô có những đúc kết và trải lòng đầy cảm xúc trong “Vạn dặm đường từ một bước chân”.\r\n\r\nKhông chỉ là một cuốn \"cẩm nang du lịch\" bình thường, “Vạn dặm đường từ một bước chân” còn là cuốn sách tiếp thêm động lực, truyền lửa đam mê xê dịch và sống hết mình trong mỗi bạn trẻ. “Thật ra điều người ta chinh phục không phải một cột mốc đá, mà là cả một cuộc hành trình. Trong hành trình đó, họ đã chinh phục được những giới hạn của bản thân, từ đó thấy được giới hạn là vô hạn.”\r\n\r\nMong rằng khi gập lại những trang sách cuối cùng, bạn nhận ra chúng ta đều đang đi trên những chặng hành trình riêng biệt. Đôi khi kết quả không giống như xã hội kỳ vọng hay những gì bạn mong đợi ban đầu. Thế nhưng, hãy cứ thả lỏng và sống tốt mỗi ngày, rồi lộ trình của chúng ta đều sẽ rực rỡ theo cách độc đáo nhất!', 'https://salt.tikicdn.com/cache/750x750/ts/product/f5/c5/b3/47d6526bf9911c72794fd8fb75aaed9f.png.webp'),
(8, 10, 'Nhà Giả Kim', 98, 2, 40000, 47400, 'Nhã Nam', 'Nhà Xuất Bản Hà Nội', 'Paulo Coelho', 'Lê Chu Cầu', '2020', '13 x 20.5 cm', 228, NULL, 'Sơ lược về tác phẩm\r\n\r\nTất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.”\r\n\r\n- The Economist, London, Anh\r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.”\r\n\r\n- Frankfurter Allgemeine Zeitung, Đức', 'https://salt.tikicdn.com/cache/750x750/ts/product/45/3b/fc/aa81d0a534b45706ae1eee1e344e80d9.jpg.webp'),
(9, 11, 'Thi Nhân Việt Nam', 100, 0, 80000, 93500, 'Nhà sách Minh Thắng', 'Nhà Xuất Bản Văn Học', NULL, NULL, NULL, '', 0, NULL, 'Thi nhân Việt Nam là công trình biên khảo có giá trị tin cậy về phong trào Thơ mới, cả về ba mặt: Nghiên cứu, phê bình và tuyển thơ. Cuốn sách ra đời sau khi hành trình thơ mới đã đi được 10 năm và vẫn còn tiếp tục chặng đường, nhưng vẫn có ý nghĩa của một công trình tổng kết cả phong trào.\r\n\r\nCuốn sách có giá trị nghệ thuật rất cao với giọng văn tâm tình, âm điệu nhẹ nhàng và câu từ duyên dáng, dí dỏm.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/7e/ae/63/8ac45cc9e39416e2170397de76d8b5ec.jpg.webp'),
(10, 12, 'Một Người Việt Trầm Lặng', 99, 1, 60000, 71760, 'First News - Trí Việt', 'Nhà Xuất Bản Tổng hợp TP.HCM', NULL, 'Nguyễn Văn Sự', '2020', '13 x 20.5 cm', 208, NULL, 'Tác phẩm với (tựa gốc tiếng Pháp: Un Vietnamien bien tranquille) của Jean-Claude Pomonti là một cách dựng tiểu sử nhà tình báo lỗi lạc Việt Nam Phạm Xuân Ẩn khá độc đáo.\r\n\r\nĐã có nhiều cuốn sách của giới nghiên cứu, học giả, ký giả Mỹ viết về Phạm Xuân Ẩn, có thể kể: Thomas Bass vớiĐiệp viên Z.21 – Kẻ thù tuyệt vời của nước Mỹ hay Larry Berman với Điệp viên hoàn hảo mà First News &NXB Hồng Đức đã có dịp giới cùng độc giả Việt Nam Tuy nhiên, sự nghiệp tình báo của Phạm Xuân Ẩn đặt trong cục diện chiến trường miền Nam rất cần được liên hệ trong một bối cảnh lịch sử rộng lớn hơn - cuộc chiến tranh Đông Dương - và vì thế, chúng ta cần thêm một cái nhìn, quan điểm từ người Pháp.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'https://salt.tikicdn.com/cache/750x750/ts/product/ee/57/f6/37866b5bfe790ae307cdf140310151db.jpg.webp'),
(11, 13, 'Cây Cam Ngọt Của Tôi', 100, 0, 95000, 108000, 'Nhã Nam', 'Nhà Xuất Bản Hội Nhà Văn', 'JOSÉ MAURO DE VASCONCELOS', NULL, NULL, NULL, 244, NULL, '“Vị chua chát của cái nghèo hòa trộn với vị ngọt ngào khi khám phá ra những điều khiến cuộc đời này đáng số một tác phẩm kinh điển của Brazil.”\r\n\r\n- Booklist\r\n\r\n“Một cách nhìn cuộc sống gần như hoàn chỉnh từ con mắt trẻ thơ… có sức mạnh sưởi ấm và làm tan nát cõi lòng, dù người đọc ở lứa tuổi nào.”\r\n\r\n- The National\r\n\r\nHãy làm quen với Zezé, cậu bé tinh nghịch siêu hạng đồng thời cũng đáng yêu bậc nhất, với ước mơ lớn lên trở thành nhà thơ cổ thắt nơ bướm. Chẳng phải ai cũng công nhận khoản “đáng yêu” kia đâu nhé. Bởi vì, ở cái xóm ngoại ô nghèo ấy, nỗi khắc khổ bủa vây đã che mờ mắt người ta trước trái tim thiện lương cùng trí tưởng tượng tuyệt vời của cậu bé con năm tuổi.\r\n\r\nCó hề gì đâu bao nhiêu là hắt hủi, đánh mắng, vì Zezé đã có một người bạn đặc biệt để trút nỗi lòng: cây cam ngọt nơi vườn sau. Và cả một người bạn nữa, bằng xương bằng thịt, một ngày kia xuất hiện, cho cậu bé nhạy cảm khôn sớm biết thế nào là trìu mến, thế nào là nỗi đau, và mãi mãi thay đổi cuộc đời cậu.\r\nMở đầu bằng những thanh âm trong sáng và kết thúc lắng lại trong những nốt trầm hoài niệm, Cây cam ngọt của tôi khiến ta nhận ra vẻ đẹp thực sự của cuộc sống đến từ những điều giản dị như bông hoa trắng của cái cây sau nhà, và rằng cuộc đời thật khốn khổ nếu thiếu đi lòng yêu thương và niềm trắc ẩn. Cuốn sách kinh điển này bởi thế không ngừng khiến trái tim người đọc khắp thế giới thổn thức, kể từ khi ra mắt lần đầu năm 1968 tại Brazil.\r\n\r\nTác giả:\r\n\r\nJOSÉ MAURO DE VASCONCELOS (1920-1984) là nhà văn người Brazil. Sinh ra trong một gia đình nghèo ở ngoại ô Rio de Janeiro, lớn lên ông phải làm đủ nghề để kiếm sống. Nhưng với tài kể chuyện thiên bẩm, trí nhớ phi thường, trí tưởng tượng tuyệt vời cùng vốn sống phong phú, José cảm thấy trong mình thôi thúc phải trở thành nhà văn nên đã bắt đầu sáng tác năm 22 tuổi. Tác phẩm nổi tiếng nhất của ông là tiểu thuyết mang màu sắc tự truyện Cây cam ngọt của tôi. Cuốn sách được đưa vào chương trình tiểu học của Brazil, được bán bản quyền cho hai mươi quốc gia và chuyển thể thành phim điện ảnh. Ngoài ra, José còn rất thành công trong vai trò diễn viên điện ảnh và biên kịch.', 'https://salt.tikicdn.com/cache/750x750/ts/product/5e/18/24/2a6154ba08df6ce6161c13f4303fa19e.jpg.webp'),
(12, 14, 'Truyện Cổ Nước Nam', 100, 0, 60000, 71500, 'Nhà sách Minh Thắng', 'Nhà Xuất Bản Dân Trí', NULL, NULL, '2021', '14.5 x 20.5 cm', 452, NULL, '\"Nước ta cổ những hơn bốn nghìn năm \" câu nhiều người Nam ta thường nói , mà như có ý tự phụ cho cái \"cổ\" là quý. ', 'https://salt.tikicdn.com/cache/750x750/ts/product/f0/57/cd/b5bea86beb15d9584cbde9b3ca72f72a.jpg.webp'),
(13, 30, 'Mặt Trời Bị Đánh Cắp', 98, 2, 10000, 15000, 'Công ty TNHH Quốc Tế Mai Hà', 'Nhà Xuất Bản Hà Nội', 'Kornei Chukovsky', NULL, '2021', NULL, 20, NULL, 'Trong suốt những năm 70 đến 90 của thế kỷ XX, truyện thiếu nhi Liên Xô, đặc biệt là các cuốn truyện tranh đã được in viện trợ cho Việt Nam. Thậm chí sau này, phong cách vẽ minh họa trong sách giáo khoa bậc tiểu học của nước ta cũng ảnh hưởng nhiều từ những nét vẽ minh họa trong các cuốn sách thiếu nhi Liên Xô. Trong các câu chuyện, ngoài những bài học đạo đức dạy cho thiếu nhi thì sách cũng đề cao tư tưởng yêu tổ quốc, chuộng lao động. Đọc truyện thiếu nhi của Liên Xô, không khó để nhận ra hình ảnh quen thuộc của những người dân lao động hăng say, các cô chú công nhân miệt mài trong các công xưởng; những người cha, người mẹ ngày đêm chăm bón những luốn rau xanh trên nông trường. Những hình ảnh đó, đôi khi được thể hiện bằng việc nhân hóa những con vật, để chúng có những tính cách như con người, qua đó thể hiện nhiều nét tính cách, giúp các bạn nhỏ nhìn nhận được các bài học nhưng không hề khô cứng. Điều dễ gây ấn tượng nhất của những cuốn sách ra đời thời kỳ Liên Xô đó chính là hình ảnh minh họa đẹp. Thế giới động vật hiện lên qua từng trang truyện vô cùng sống động, mỗi loài vật đều có cá tính riêng với những biểu cảm, hành động như con người. Cách phối màu hài hòa, nét vẽ chau chuốt đến từng chi tiết khiến cho mỗi ấn phẩm không chỉ là một cuốn sách thiếu nhi đơn thuần, mà giống như tác phẩm nghệ thuật thực thụ.', 'https://salt.tikicdn.com/cache/750x750/ts/product/a8/f9/bc/69ab8bf1953be7fb1bea8a8795920633.jpg.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `checkbox` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`userid`, `bookid`, `quantity`, `checkbox`) VALUES
(1, 3, 1, 0),
(12, 2, 2, 0),
(13, 4, 1, 0),
(13, 5, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `catename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cateid`, `catename`) VALUES
(9, 'Công nghệ thông tin'),
(5, 'Giáo khoa - Giáo trình'),
(6, 'Khoa học - Kỹ thuật'),
(2, 'Kinh tế'),
(4, 'Kỹ năng sống'),
(7, 'Lịch sử'),
(3, 'Thiếu nhi'),
(8, 'Tôn giáo - tâm linh'),
(10, 'Văn hóa - Địa lý - Du lịch'),
(1, 'Văn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `text` text NOT NULL,
  `star` int(11) NOT NULL,
  `feedbackdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `bookid`, `userid`, `text`, `star`, `feedbackdate`) VALUES
(18, 6, 13, 'Sách rất hữu ích cho dân văn phòng', 5, '2024-04-15 12:48:48'),
(19, 5, 13, 'Sách đầy đủ những cách dùng của excel', 5, '2024-04-15 13:11:11'),
(23, 2, 13, 'sách hay', 4, '2024-04-15 13:22:52'),
(24, 1, 13, 'Sách hay nên đọc ', 5, '2024-04-15 15:19:11'),
(25, 5, 8, 'Sản phẩm ổn', 4, '2024-04-15 15:32:09'),
(26, 5, 8, 'Sản phẩm ổn', 4, '2024-04-15 15:41:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `genreid` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `genrename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`genreid`, `cateid`, `genrename`) VALUES
(9, 1, 'Du ký'),
(10, 1, 'Tác phẩm kinh điển'),
(11, 1, 'Thơ'),
(12, 1, 'Tiểu sử - Hồi ký'),
(13, 1, 'Tiểu thuyết'),
(14, 1, 'Truyện cổ tích - Ngụ ngôn'),
(15, 1, 'Truyện kinh dị'),
(16, 1, 'Truyện ngắn - Tản văn - Tạp văn'),
(17, 2, 'Bài học kinh doanh'),
(18, 2, 'Sách doanh nhân'),
(19, 2, 'Sách khởi nghiệp'),
(20, 2, 'Sách kinh tế học'),
(21, 2, 'Sách kỹ năng làm việc'),
(22, 2, 'Sách Marketing - Bán hàng'),
(23, 2, 'Sách quản trị, lãnh đạo'),
(24, 2, 'Sách quản trị nhân lực'),
(25, 2, 'Sách tài chính'),
(26, 3, 'Đạo đức - Kỹ năng sống'),
(27, 3, 'Kiến thức - Bách khoa'),
(28, 3, 'Tô màu - Luyện chữ'),
(29, 3, 'Truyện cổ tích'),
(30, 3, 'Truyện kể cho bé'),
(31, 3, 'Truyện tranh thiếu nhi'),
(32, 4, 'Sách tư duy - Kỹ năng sống'),
(33, 4, 'Sách hướng nghiệp'),
(34, 4, 'Sách kỹ năng mềm'),
(35, 5, 'Sách Giáo Khoa cấp 1'),
(36, 5, 'Sách Giáo khoa cấp 2'),
(37, 5, 'Sách Giáo Khoa cấp 3'),
(38, 5, 'Giáo Trình Đại Học - Cao Đẳng'),
(39, 6, 'Sách khoa học'),
(40, 6, 'Sách kỹ thuật'),
(41, 7, 'Lịch Sử Việt Nam'),
(42, 7, 'Lịch Sử Thế Giới'),
(43, 8, 'Công giáo'),
(44, 8, 'Phật giáo'),
(45, 9, 'Tin học văn phòng'),
(46, 9, 'Lập trình'),
(47, 9, 'Thiết kế - Đồ họa'),
(48, 10, 'Sách Địa Danh - Du Lịch'),
(49, 10, 'Sách Phong Tục - Tập Quán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `methodpayment`
--

CREATE TABLE `methodpayment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `methodpayment`
--

INSERT INTO `methodpayment` (`id`, `name`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán bằng thẻ'),
(3, 'Thanh toán bằng mã QR ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `statusorderid` int(11) NOT NULL,
  `methodpayid` int(1) NOT NULL,
  `statusfeedback` tinyint(1) NOT NULL,
  `orderdate` datetime NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` char(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `ward` varchar(200) NOT NULL,
  `addressdetail` varchar(200) NOT NULL,
  `totalbook` int(11) NOT NULL,
  `typeshipid` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`orderid`, `userid`, `statusorderid`, `methodpayid`, `statusfeedback`, `orderdate`, `fullname`, `phone`, `email`, `city`, `district`, `ward`, `addressdetail`, `totalbook`, `typeshipid`, `total`) VALUES
(10, 13, 4, 1, 0, '2024-04-13 17:45:56', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 130500, 1, 155500),
(35, 13, 4, 1, 0, '2024-04-13 18:49:39', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 261000, 1, 286000),
(36, 13, 4, 1, 1, '2024-04-13 19:09:34', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 130500, 1, 155500),
(37, 13, 4, 1, 1, '2024-04-13 20:40:51', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 357200, 2, 407200),
(39, 13, 4, 1, 1, '2024-04-13 20:49:36', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 287700, 1, 312700),
(41, 8, 1, 2, 0, '2024-04-14 13:32:45', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 71800, 1, 96800),
(43, 8, 1, 1, 0, '2024-04-14 08:42:48', 'Nguyễn Thị Loan B20DCCN401', '0123456789', 'looaann123@gmail.com', 'ha noi', 'hoai duc', 'Song Phương', '19', 71800, 1, 96800),
(45, 8, 1, 2, 0, '2024-04-14 16:46:46', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 71800, 2, 121800),
(49, 8, 4, 1, 1, '2024-04-14 12:25:47', 'Nguyễn Thị Loan B20DCCN401', '0123456789', 'looaann123@gmail.com', 'ha noi', 'hoai duc', 'sd', 'df', 159000, 1, 184000),
(50, 8, 1, 2, 0, '2024-04-14 17:28:08', 'Nguyễn Thị Loan B20DCCN401', '0123456789', 'looaann123@gmail.com', 'Ha Noi', 'hoai duc', 'Song Phương', 'df', 128700, 1, 153700),
(54, 8, 4, 2, 1, '2024-04-14 19:03:07', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', 'AS', 159000, 1, 184000),
(55, 8, 1, 1, 0, '2024-04-14 14:04:45', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'hoai duc', 'Song Phương', '19', 130500, 1, 155500),
(56, 8, 1, 1, 0, '2024-04-14 15:27:35', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 287700, 1, 312700),
(57, 13, 1, 1, 0, '2024-04-15 15:02:11', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', 'AS', 261000, 1, 286000),
(58, 8, 1, 2, 0, '2024-04-16 00:44:31', 'Nguyễn Thị Loan B20DCCN401', '0123456789', 'looaann123@gmail.com', 'Hà Nội', 'Hoài Đức', 'Song Phương', 'DF', 130500, 1, 155500),
(59, 8, 1, 2, 0, '2024-04-16 00:47:15', 'Nguyễn Thị Loan B20DCCN401', '0123456789', 'looaann123@gmail.com', 'Hà Nội', 'Hoài Đức', 'Song Phương', 'DF', 549000, 1, 574000),
(60, 18, 1, 1, 0, '2024-04-16 18:21:59', 'Lâm Hình', '0123456789', 'hinhlam357@gmail.com', 'HN', 'HD', 'SP', 'SP', 135150, 1, 160150),
(61, 18, 1, 2, 0, '2024-04-16 23:25:30', 'Lâm Hình', '0123456789', 'hinhlam357@gmail.com', 'HN', 'HD', 'SP', 'SP', 47400, 1, 72400),
(62, 12, 1, 2, 0, '2024-04-24 09:24:33', 'nguyen thi loan', '0359926002', 'loannguyenabcd123@gmail.com', 'hanoi', 'Hoài Đức', 'Song Phương', '19', 261000, 1, 286000),
(63, 1, 1, 1, 0, '2024-05-17 09:45:37', 'Nguyen Van A', '0123456789', 'loannguyenabcd123@gmail.com', 'Hà Nội', 'Hoài Đức', 'Song Phương', '123', 47400, 1, 72400),
(64, 1, 1, 2, 0, '2024-05-17 14:58:51', 'Nguyen Van A', '0123456789', 'loannguyenabcd123@gmail.com', 'Hà Nội', 'Hoài Đức', 'Song Phương', '123', 71760, 1, 96760),
(66, 1, 1, 3, 0, '2024-05-19 12:11:04', 'Nguyen Van A', '0123456789', 'loannguyenabcd123@gmail.com', 'Hà Nội', 'Hoài Đức', 'Song Phương', '123', 15000, 1, 40000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `feedbackid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `bookid`, `quantity`, `feedbackid`) VALUES
(10, 1, 1, NULL),
(35, 1, 2, NULL),
(36, 1, 1, 24),
(37, 2, 2, 23),
(39, 5, 1, 19),
(39, 6, 1, 18),
(41, 4, 1, NULL),
(43, 4, 1, NULL),
(45, 4, 1, NULL),
(49, 5, 1, 26),
(50, 6, 1, NULL),
(54, 5, 1, 25),
(55, 1, 1, NULL),
(56, 5, 1, NULL),
(56, 6, 1, NULL),
(57, 1, 2, NULL),
(58, 1, 1, NULL),
(59, 3, 1, NULL),
(60, 7, 1, NULL),
(61, 8, 1, NULL),
(62, 1, 2, NULL),
(63, 8, 1, NULL),
(64, 10, 1, NULL),
(66, 13, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusorder`
--

CREATE TABLE `statusorder` (
  `statusorderid` int(11) NOT NULL,
  `statusordername` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `statusorder`
--

INSERT INTO `statusorder` (`statusorderid`, `statusordername`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang chuẩn bị'),
(3, 'Đang giao'),
(4, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeship`
--

CREATE TABLE `typeship` (
  `typeshipid` int(11) NOT NULL,
  `typeshipname` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `typeship`
--

INSERT INTO `typeship` (`typeshipid`, `typeshipname`, `price`) VALUES
(1, 'Tiêu chuẩn', 25000),
(2, 'Nhanh', 50000),
(3, 'miễn phí', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` char(15) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `district` varchar(200) DEFAULT NULL,
  `ward` varchar(200) DEFAULT NULL,
  `addressdetail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `roleid`, `fullname`, `username`, `password`, `email`, `phone`, `city`, `district`, `ward`, `addressdetail`) VALUES
(1, 2, 'Nguyen Van A', 'customer1', '$2y$10$P7xvBlIf4.zX1mNF1KqHOOPP0v52mhbY6P1JkgLSXp2V/SQDxC0au', 'loannguyenabcd123@gmail.com', '0123456789', 'Hà Nội', 'Hoài Đức', 'Song Phương', '123'),
(4, 2, 'nguyen thi loan', 'customer2', '$2y$10$QCtT3SmsHIA/T2RcicFuDOrwFnSdNEXpJJHrBrpZYC6SOz0.ZUO26', 'loannguyenabcd123@gmail.com', ' 0359926002', NULL, NULL, NULL, NULL),
(8, 2, 'Nguyễn Thị Loan B20DCCN401', 'looaann123@gmail.com', '$2y$10$qnNeQyjqaBevnS0LmNZXW.59FCnJpUl8Hv6zhU3NjvgtVsq1JR2fW', 'looaann123@gmail.com', '0123456789', 'Hà Nội', 'Hoài Đức', 'Song Phương', 'DF'),
(11, 2, 'nguyen thi loan', 'customer3', '$2y$10$WvohjG7JVdAt4X5YXITAK.2.J0ZaFadGZgNVWJDYlUaoCpKfdbcBq', 'loannguyenabcd123@gmail.com', ' 0359926002', NULL, NULL, NULL, NULL),
(12, 2, 'Loan Nguyễn', 'loannguyenabcd123@gmail.com', '$2y$10$dgmdzNvEXtoMRIZtkCMQzuatCZUDsbuG3GcBSyS0uVfCWt1u.DJPe', 'loannguyenabcd123@gmail.com', '', NULL, NULL, NULL, NULL),
(13, 2, 'nguyen thi loan', 'customer4', '$2y$10$d2uPVdmWUxe4R1laHMaLxur0SFgTRcZi/dOnpuGHZAA6ZO0YtrSlq', 'loannguyenabcd123@gmail.com', '0359926002', 'hanoi', 'Hoài Đức', 'Song Phương', 'AS'),
(17, 2, 'nguyen thi loan', 'customer5', '$2y$10$MteWoPOL1MdfJ67yIyMDH.EOYe2y.EiFxbKKYGm6vhmdIifgj4KAm', 'loannguyenabcd123@gmail.com', ' 0359926002', NULL, NULL, NULL, NULL),
(18, 2, 'Lâm Hình', 'hinhlam357@gmail.com', '$2y$10$M7ZeYsgg79usnM1zLaOc1uFezCI6H4jCEFurgANC1dOemq6eAYFPO', 'hinhlam357@gmail.com', '', NULL, NULL, NULL, NULL),
(19, 2, 'nguyen thi loan', 'customer6', '$2y$10$7IvmM9uqg4EHqss.r.fn6eVBe2e917cHHijVLJWRiFBRePAfgynDW', 'loannguyenabcd123@gmail.com', ' 0359926002', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressid`);

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`),
  ADD UNIQUE KEY `bookname` (`bookname`),
  ADD KEY `book_ibfk_1` (`genreid`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userid`,`bookid`),
  ADD KEY `bookid` (`bookid`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`),
  ADD UNIQUE KEY `catename` (`catename`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreid`),
  ADD UNIQUE KEY `genrename` (`genrename`),
  ADD KEY `cateid` (`cateid`);

--
-- Chỉ mục cho bảng `methodpayment`
--
ALTER TABLE `methodpayment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `typeshipid` (`typeshipid`),
  ADD KEY `statusorderid` (`statusorderid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `methodpayid` (`methodpayid`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`,`bookid`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `feedbackid` (`feedbackid`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Chỉ mục cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  ADD PRIMARY KEY (`statusorderid`);

--
-- Chỉ mục cho bảng `typeship`
--
ALTER TABLE `typeship`
  ADD PRIMARY KEY (`typeshipid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `addressid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `genre`
--
ALTER TABLE `genre`
  MODIFY `genreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `methodpayment`
--
ALTER TABLE `methodpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  MODIFY `statusorderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `typeship`
--
ALTER TABLE `typeship`
  MODIFY `typeshipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`genreid`) REFERENCES `genre` (`genreid`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Các ràng buộc cho bảng `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`cateid`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`typeshipid`) REFERENCES `typeship` (`typeshipid`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`statusorderid`) REFERENCES `statusorder` (`statusorderid`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`methodpayid`) REFERENCES `methodpayment` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`feedbackid`) REFERENCES `feedback` (`feedbackid`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;