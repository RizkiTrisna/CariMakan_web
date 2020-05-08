-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2020 pada 06.27
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(112233, 1223344, 'iniadalahkey', 1, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cafe`
--

CREATE TABLE `tb_cafe` (
  `id_cafe` int(11) NOT NULL,
  `nm_cafe` varchar(50) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `daftar_menu` text DEFAULT NULL,
  `jam_buka` int(11) DEFAULT NULL,
  `jam_tutup` int(11) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(25) NOT NULL,
  `kursi_sisa` int(11) DEFAULT NULL,
  `kursi_max` int(11) DEFAULT NULL,
  `id_status_sewa` int(11) NOT NULL,
  `harga_sewa_per_kursi` int(11) DEFAULT NULL,
  `harga_sewa_cafe` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cafe`
--

INSERT INTO `tb_cafe` (`id_cafe`, `nm_cafe`, `fasilitas`, `daftar_menu`, `jam_buka`, `jam_tutup`, `alamat`, `no_wa`, `kursi_sisa`, `kursi_max`, `id_status_sewa`, `harga_sewa_per_kursi`, `harga_sewa_cafe`, `gambar`) VALUES
(1, 'Hidden Garage', '1. Live music\r\n2. Kamar kecil\r\n3. Game board(UNO)', 'Snack:\r\n1. French Fires - 15000\r\n2. Cireng Bandung - 15000\r\n3. Tahu Walik - 15000\r\n4. Wedges - 15000\r\n\r\nDrink:\r\n1. Milkshake Green tea,coklat,taro,red velvet - 15000\r\n2. Coffee tubruk Robusta/arabica - 10000\r\n3. Coffee beer - 10000\r\n4. Thai Tea - 15000\r\n5. Ice Blend - 16000\r\n6. Hot/ Ice green tea,coklat,taro,red velvet - 13000\r\n7. V60 Coffee Robusta/Arabica - 15000\r\n18. Ice Coffee - 15000', 1, 1, 'Jalan Ikan Tombro RT.1/RW.1 Mojolangu Kota Malang', '+6282245227801', 45, 1, 1, 5000, 550000, 'coffee.jpg'),
(2, 'Labore Coffee Eatery', '1. Free Wifi\r\n2. Wastafel Cuci Tangan\r\n3. Kamar kecil', 'Sharing Snack\r\n1. Animal Fries (26000)\r\n2. Gogi Fries (28000)\r\n3. Egg Roll (27000)\r\n4. Vietnamese Spring Roll (30000)\r\n5. Cilli Oil Wonton (30000)\r\n6. Chicken Ribs (30000)\r\n7. Hot Wings (30000)\r\n8. Scallion Pancake Taco (30000)\r\n9. Shrimp Toast (28000)\r\n10. Salt and Pepper Crispy Mushroom (26000)\r\n11. Truffle Fries (28000)\r\n\r\nMain Course\r\n1. Pad Kahprao (35000)\r\n2. Chicken Karage (36000)\r\n3. Bulgogi Beef (39000)\r\n4. Broken Chicken (35000)\r\n5. Spicy Garlic Chicken (35000)\r\n6. Salted Egg Yolk Chicken (35000)\r\n7. Chicken Chop (36000)\r\n8. Loco Moco Grilled / Fried (35000)\r\n9. Chicken Katsu Curry (36000)\r\n10. Menchi Beef Japanese Curry (37000)\r\n11. Ma La Fish (36000)\r\n12. Pho Ga (35000)\r\n13. Pho bo (37000)\r\n14. General Tso\'s Chicken (35000)\r\n15. Lemongrass Chicken (36000)\r\n16. Fire Chicken (35000)\r\n17. Gyutadon (36000)\r\n\r\nSweets\r\n1. Classic Panookie (34000)\r\n2. Classic Molten Lava (32000)\r\n3. Golden Molten Lava (34000)\r\n4. Ovo Crunch Toast (38000)\r\n5. Taro Creme Caramel (32000)\r\n6. Brioche French Toast (34000)\r\n7. Caramelized Baguette Toast (34000)\r\n8. Red Velvet Pancake (32000)\r\n9. Banana Bread (32000)\r\n10. Apple Pie (34000)', 1, 1, 'Jl. Soekarno Hatta No. 25 Malang', '+6282245227801', 45, 2, 1, 25000, 850000, 'bg-cafe.jpg'),
(3, 'Cokelat Klasik Cafe', '1. Free Wifi\r\n2. Wastafel\r\n3. Toilet/ Kamar Kecil', 'Food:\r\n1. Chicken Steak - 29000\r\n2. Grill Ckicken Mushroom - 30000\r\n3. Beef Steak - 35000\r\n4. Long Sausage - 55000\r\n5. Scrambled Sausage - 30000\r\n6. Hot Dog - 25000\r\n7. Rice Bowl Blackpaper Mushroom BBQ - 18000\r\n8. Meatball BBQ - 18000\r\n9. Mie Pedas Original - 18000\r\n10. Mie Pedas Blackpaper - 18000\r\n11. Mie Ayam Kepala - 15000\r\n12. Mie Ayam Bakso - 15000\r\n13. Pecel Klasik Tahu Tempe - 16000\r\n14. Pecel Klasik Ayam Fillet - 16000\r\n15. Urap Ayam Sambal - 18000\r\n16. Urap Ayam Bumbu Kuning - 18000\r\n17. Gado-gado - 16000\r\n18. Geprak Ayam Tahu Tempe - 16000\r\n19. Geprak Ayam Bakso - 16000\r\n20. Geprak Ayam Telor - 16000\r\n21. Mie Kekinian - 18000\r\n22. Siomay - 15000\r\n23. Batagor - 15000\r\n\r\nBeverage:\r\n1. Cokelat Klasik Ice - 10000\r\n2. Cokelat Klasik Hot - 10000\r\n3. Passson of Taro - 15000\r\n4. Strawberry Punch - 15000\r\n5. Lychee Jelly - 15000\r\n6. Ice Melon - 15000\r\n7. Ice Naco - 15000\r\n8. Ice Tea - 5000\r\n9. Ice Dawet - 10000\r\n10. Ice Cincau - 10000\r\n11. Mineral Water - 4000\r\n\r\nSnack: \r\n1. Churros - 15000\r\n2. Pancake - 10000\r\n3. Fantastic Pancake - 20000\r\n4. Banana Bread - 10000\r\n5. Siomay Goreng - 10000\r\n6. Tahu Crispy - 10000\r\n7. Tahu Petis - 10000\r\n8. Friench Fries - 10000\r\n9. Nuget - 10000\r\n10. Bakso Goreng - 10000\r\n11. Wings Snack - 25000', 1, 1, 'Jl. Joyo Agung No. 184, Merjosari, Malang', '+6281334514643', 25, 3, 1, 10000, 1500000, 'cokelat-klasik.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nm_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nm_level`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_restaurant`
--

CREATE TABLE `tb_restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `nm_restaurant` varchar(50) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `daftar_menu` text DEFAULT NULL,
  `jam_buka` int(11) DEFAULT NULL,
  `jam_tutup` int(11) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(25) NOT NULL,
  `kursi_sisa` int(11) DEFAULT NULL,
  `kursi_max` int(11) DEFAULT NULL,
  `id_status_sewa` int(11) NOT NULL,
  `harga_sewa_per_kursi` int(11) DEFAULT NULL,
  `harga_sewa_restaurant` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_restaurant`
--

INSERT INTO `tb_restaurant` (`id_restaurant`, `nm_restaurant`, `fasilitas`, `daftar_menu`, `jam_buka`, `jam_tutup`, `alamat`, `no_wa`, `kursi_sisa`, `kursi_max`, `id_status_sewa`, `harga_sewa_per_kursi`, `harga_sewa_restaurant`, `gambar`) VALUES
(1, 'Rice Bowl Restaurant', '1. Free Wifi', 'Menu Fried Rice:\r\n1. Spicy Chicken BBQ Fried Rice - 30900\r\n2. Chicken Fried Rice = 30900\r\n3. Yang Chau Fried Rice - 30900\r\n4. Chicken BBQ Fried Rice - 41900\r\n5. Kung Pao Chicken Fried Rice - 40900\r\n6. Duck Fried Rice - 41900\r\n\r\nMenu Rice Bowl - 27900 ~ 48900\r\n\r\nMenu Set:\r\n1. Singapore Hainanese Chicken Set - 47900\r\n2. Hongkong Hainanese Chicken Set - 47900\r\n3. Hongkong Fried Chicken Set - 47900\r\n4. Kombinasi BBQ Set - 52900\r\n5. Roasted Duck Set - 61900\r\n\r\nMenu Mie & Bubur - 18900 ~ 49900\r\nGyoza Soup, Japanese Gyoza Noodle Bowl, Japanese BBQ Noodle Bowl, Hongkong Fried Chicken Noodle Bowl, Singapore Hainanese Chicken with Chili Oil Noodle Bowl, Hongkong Hainanese Chicken Noodle Bowl, Singapore Hainanese Chicken Noodle Bowl, BBQ Chicken Noodle Bowl, Chicken BBQ & Gyoza Hongkon Noodle Bowl, Kung Pao Chicken Noodle Bowl, I Fu Mie Seafood, Seafood Dry Noodle Bowl, Fried Kwetiau Seafood, Seafood Penang Sauce Noodle Bowl, Fried Kwetiau Seafood with Penang Sauce, Kwetiau Seafood, Kwetiau Chicken Tomato Soup, Beef Brisket Noodle Bowl, Duck with Mushroom Noodle Bowl, Kwetiau Beef, Roasted Duck Noodle Bowl, Shredded Hongkong Chicken Porridge, Shredded Chicken Porridge\r\n\r\n\r\nMenu Soup, Appetizer, and Dim Sum (porsi untuk 3 - 4 orang)\r\n1. Chicken Corn Soup - Rp 35.900\r\n2. Hot & Sour Chicken Soup - Rp 35.900\r\n3. Seafood Soup - Rp 39.900\r\n4. Bean Curd & Seafood Soup - Rp 39.900\r\n5. Chicken Egg Roll - Rp 25.900\r\n6. Shrimp Egg Roll - Rp 35.900\r\n7. Chicken Chasew Paow - Rp 18.900\r\n8. Gyoza - Rp 16.900\r\n9. Lo Mai Kai - Rp 23.900\r\n10. Shrimp Tofu - Rp 27.900\r\n11. Siomay - Rp 24.900\r\n12. Steamed Chicken Claw - Rp 18.900\r\n13. Fried Siomay - Rp 27.900\r\n\r\n\r\n\r\n', 10, 21, 'Jl. Terusan Dieng No.32, Lt. Lower Ground Mall Malang City Point, Malang', '+6282245227801', 45, 90, 1, 15000, 550000, '84299-secangkir-kopi.jpg'),
(2, 'Hayaku Steamboat & Yakiniku', '1. Free Wifi\r\n2. Wastafel Cuci Tangan\r\n3. Baby Chair\r\n4. Toilet / Kamar Kecil\r\n5. Musholla', 'Paket Combo Steamboat + Yakiniku								Paket combo lengkap khusus member dengan Steamboat Reguler, Yakiniku Special Mixed, dan 4 es teh. Porsi untuk 3 - 4 orang. Yakiniku Special Mixed terdiri dari daging sapi, sosis, daging ayam, bawang bombay, dan udang. Steamboat Reguler terdiri dari daging sapi, udang, chikuwa, dumpling, tahu seafood, crab stick, bakso ikan, salmon balls, bihun, dan sayuran. - Rp 110.000\r\n\r\nMenu set makanan rebus yang dihidangkan dengan daging sapi, udang, chikuwa, dumpling, tahu seafood, crab stick, bakso ikan, salmon balls, bihun, dan sayuran. - Rp 60.000\r\n\r\nPaket Steamboat Special\r\nMenu set makanan rebus yang dihidangkan dengan daging sapi, udang, chikuwa, dumpling, tahu seafood, crab stick, bakso ikan, salmon balls, bihun, dan sayuran. - Rp 75.000\r\n\r\nPaket Yakiniku Special Mixed\r\nMenu set irisan daging tipis yang dimasak dengan cara dipanggang, terdiri dari daging sapi, sosis, daging ayam, bawang bombay, dan udang. - Rp 60.000\r\n\r\nPaket Yakiniku Special Beef\r\nMenu set irisan daging tipis yang dimasak dengan cara dipanggang, terdiri dari daging sapi, sosis, daging ayam, bawang bombay, dan udang. - Rp 65.000\r\n\r\nYakiniku Special Chicken\r\nMenu set irisan daging ayam tipis yang dimasak dengan cara dipanggang disajikan bersama bawang bombay. - Rp 45.000\r\n\r\nSteamboat Bowl\r\nSatu mangkuk steamboat dengan isian 1 chikuwa, 1 tofu, 1 siomay, 1 salmon balls, 1 fish balls,1 udang, bihun, sawi putih, dan sawi hijau. - Rp 20.000\r\n\r\nPaket Steamboat Hemat\r\nPaket menu khusus member. - Rp 40.000\r\n\r\nMenu Puasa Paket Bukber\r\nMenu paket buka puasa dengan Steamboat Hemat, Yakiniku Special Chicken, dan Free 4 Nasi Putih. Porsi untuk 4 - 6 orang. Paket menu tersedia pkl 16:00 - 20:00. - Rp 85.000', 15, 23, 'Jl. Bendungan Sigura-Gura Barat Raya No. 1C, Malang', '+6282120420430', 12, 45, 1, 25000, 1300000, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_cafe` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`id_review`, `id_cafe`, `nama`, `judul`, `review`) VALUES
(1, 1, 'Trisna', 'Tidak jadi enak!', 'Saya mengulangi apa yang pernah saya lakukan!, Tidak enak'),
(2, 2, 'Trisna', 'Tidak jadi enakJuga', 'Saya mengulangi apa yang pernah saya lakukan!, Tidak enak'),
(3, 1, 'Roni', 'Enak Sekali!', 'Ini adalah cafe terenak yang pernah saya kunjungi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_sewa_cafe`
--

CREATE TABLE `tb_status_sewa_cafe` (
  `id_status` int(11) NOT NULL,
  `nm_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_sewa_cafe`
--

INSERT INTO `tb_status_sewa_cafe` (`id_status`, `nm_status`) VALUES
(1, 'Belum disewa'),
(2, 'Sudah disewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_sewa_restaurant`
--

CREATE TABLE `tb_status_sewa_restaurant` (
  `id_status` int(11) NOT NULL,
  `nm_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_sewa_restaurant`
--

INSERT INTO `tb_status_sewa_restaurant` (`id_status`, `nm_status`) VALUES
(1, 'Belum disewa'),
(2, 'Sudah disewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nohp` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `id_level` int(11) NOT NULL,
  `id_cafe` int(11) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `nohp`, `no_ktp`, `alamat`, `id_level`, `id_cafe`, `password`) VALUES
(3, 'Kukuh Ramadhani', 'kukuh@mail.com', '+628222993366', '0918029318121212', 'Malang, Jawa Timur', 2, 1, 'haikukuh'),
(4, 'Rizki Trisna Rully Abadi', 'dimas@mail.com', '082245227801', '31363424241', 'asaa', 1, NULL, 'hiyahiyahiya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_cafe`
--
ALTER TABLE `tb_cafe`
  ADD PRIMARY KEY (`id_cafe`),
  ADD KEY `id_status_sewa` (`id_status_sewa`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD PRIMARY KEY (`id_restaurant`),
  ADD KEY `id_status_sewa` (`id_status_sewa`);

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_cafe` (`id_cafe`);

--
-- Indeks untuk tabel `tb_status_sewa_cafe`
--
ALTER TABLE `tb_status_sewa_cafe`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_status_sewa_restaurant`
--
ALTER TABLE `tb_status_sewa_restaurant`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_cafe` (`id_cafe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112234;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `tb_cafe`
--
ALTER TABLE `tb_cafe`
  MODIFY `id_cafe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212224;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212225;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_status_sewa_cafe`
--
ALTER TABLE `tb_status_sewa_cafe`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_status_sewa_restaurant`
--
ALTER TABLE `tb_status_sewa_restaurant`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11223345;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_cafe`
--
ALTER TABLE `tb_cafe`
  ADD CONSTRAINT `tb_cafe_ibfk_1` FOREIGN KEY (`id_status_sewa`) REFERENCES `tb_status_sewa_cafe` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD CONSTRAINT `tb_restaurant_ibfk_1` FOREIGN KEY (`id_status_sewa`) REFERENCES `tb_status_sewa_restaurant` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`id_cafe`) REFERENCES `tb_cafe` (`id_cafe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_cafe`) REFERENCES `tb_cafe` (`id_cafe`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
