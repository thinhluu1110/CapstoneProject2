-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2017 lúc 08:44 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fes_system1`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ImportKhdt` ()  BEGIN
 Declare Khdttam_id Integer;
 Declare monhoc Varchar(255);
 Declare tenmh Varchar(255);
 Declare dvht_tc Integer ;
 Declare tongso Integer;
 Declare lythuyet Integer;
 Declare baitap Integer;
 Declare thuchanh Integer;
 Declare baitaplon Integer;
 Declare doan Integer;
 Declare khoaluan Integer;
 Declare nganhhoc_id Integer;
 Declare hocki_id Integer;
 Declare khoahoc_id Integer;
   Declare found Integer default 1;  
 Declare total Integer default 0;
 Declare id_mon Integer ;
   Declare Khdt_Cursor CURSOR
 for
 Select k.khdt_id, k.monhoc_id, k.TenMH, k.dvht_tc, k.tongso, k.lythuyet, k.baitap, k.thuchanh, k.baitaplon, k.doAn, k.khoaluan, k.nganhhoc_id, k.hocki_id, k.khoahoc_id
 From kehoachdaotao_tam k;
     DECLARE CONTINUE HANDLER FOR NOT FOUND Set found = 0;
  Open Khdt_Cursor; 
   My_Loop : loop
            fetch Khdt_Cursor into Khdttam_id, monhoc, tenmh,dvht_tc,tongso,lythuyet,baitap,thuchanh,baitaplon,doan,khoaluan,nganhhoc_id,hocki_id,khoahoc_id;
              if found = 0 then
          Leave My_Loop;
       End if;
              
       SELECT COUNT(*) INTO total FROM monhoc WHERE MaMH = monhoc;
              if total = 1 then
       		       		SET id_mon = (SELECT monhoc_id FROM monhoc WHERE MaMH = monhoc);
                            INSERT INTO kehoachdaotao (monhoc_id, dvht_tc, tongso, lythuyet, baitap, thuchanh, baitaplon, doAn, khoaluan, nganhhoc_id, hocki_id, khoahoc_id) VALUES(id_mon, dvht_tc, tongso, lythuyet, baitap, thuchanh, baitaplon, doan, khoaluan, nganhhoc_id, hocki_id, khoahoc_id);
                            DELETE FROM kehoachdaotao_tam
                            WHERE khdt_id = Khdttam_id;
              ELSE
       		       		  INSERT INTO monhoc (MaMH,TenMH) VALUES(monhoc, tenmh);
                           SET id_mon = (SELECT monhoc_id FROM monhoc WHERE MaMH = monhoc);
                            INSERT INTO kehoachdaotao (monhoc_id, dvht_tc, tongso, lythuyet, baitap, thuchanh, baitaplon, doAn, khoaluan, nganhhoc_id, hocki_id, khoahoc_id) VALUES(id_mon, dvht_tc, tongso, lythuyet, baitap, thuchanh, baitaplon, doan, khoaluan, nganhhoc_id, hocki_id, khoahoc_id);
                            DELETE FROM kehoachdaotao_tam
                            WHERE khdt_id = Khdttam_id;
       end if;
         end loop My_Loop;
    close Khdt_Cursor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImportKqht` ()  begin
declare Kqhttam_id Integer;
declare Mssv Varchar(10);
Declare Ho Varchar(100);
Declare Ten Varchar(100);
Declare Ngaysinh Varchar(100);
Declare manganh Varchar(10);
Declare Ten_lop Varchar(10);
Declare mamon Varchar(10);
Declare tenmon Varchar(100);
Declare Chuyencan Integer;
Declare Giuaki Integer;
Declare Lan1 Integer;
Declare Lan2 Integer;
Declare DTB Float;
Declare tschuyencan Integer;
Declare tsgk Integer;
Declare tsck Integer;
Declare id_hocki Integer;
Declare id_nganh integer;
Declare id_lop integer;
Declare total_hk integer default 0;
Declare total_nganh integer default 0;
Declare total_mon integer default 0;
Declare total_diem integer default 0;
Declare total_lop integer default 0;
Declare id_diem integer;
Declare found Integer default 1;  
Declare id_mon Integer;
Declare Kqht_Cursor CURSOR
FOR
SELECT k.kqht_id, k.sinhvien_id, k.ho, k.ten, k.ngaysinh, k.nganhhoc_id, k.lophoc_id, k.monhoc_id, k.TenMH, k.chuyencan, k.giuaki, k.lan1, k.lan2, k.diemTB, k.trongso_chuyencan, k.trongso_giuaki, k.trongso_cuoiki
FROM ketquahoctap_tam k;
 DECLARE CONTINUE HANDLER FOR NOT FOUND Set found = 0;
 OPEN Kqht_Cursor;
 My_Loop : LOOP
 FETCH Kqht_Cursor INTO Kqhttam_id,Mssv,Ho,Ten,Ngaysinh,manganh,Ten_lop,mamon,tenmon,Chuyencan,Giuaki,Lan1,Lan2,DTB,tschuyencan,tsgk,tsck;
 IF found = 0 THEN
 LEAVE My_Loop;
 END IF ;
 SELECT COUNT(*) INTO total_nganh FROM nganhhoc WHERE ma_nganhhoc = manganh;
 	IF total_nganh =1 THEN
    	set id_nganh = (SELECT nganhhoc_id FROM nganhhoc WHERE ma_nganhhoc = manganh);
 		SELECT COUNT(*) INTO total_mon FROM monhoc WHERE MaMH = mamon;
        IF total_mon = 1 THEN
        	set id_mon = (SELECT monhoc_id FROM monhoc WHERE MaMH = mamon);   
            SELECT COUNT(*) INTO total_hk FROM kehoachdaotao AS khdt INNER JOIN sinhvien AS sv ON sv.nganhhoc_id = khdt.nganhhoc_id && sv.khoahoc_id = khdt.khoahoc_id WHERE sv.MSSV = Mssv && khdt.monhoc_id = id_mon;	
            IF total_hk =1 THEN
            set id_hocki = (SELECT hocki_id FROM kehoachdaotao AS khdt INNER JOIN sinhvien AS sv ON sv.nganhhoc_id = khdt.nganhhoc_id && sv.khoahoc_id = khdt.khoahoc_id WHERE sv.MSSV = Mssv && khdt.monhoc_id = id_mon);
        	SELECT COUNT(*) INTO total_diem FROM ketquahoctap WHERE monhoc_id = id_mon && sinhvien_id = Mssv && hocki_id = id_hocki;
            IF total_diem = 1 THEN
            	set id_diem = (SELECT kqht_id FROM ketquahoctap WHERE monhoc_id = id_mon && sinhvien_id = Mssv && hocki_id = id_hocki);
                UPDATE ketquahoctap
                set chuyencan = Chuyencan, giuaki = Giuaki, lan1 = Lan1, lan2 = Lan2, diemTB = DTB, trongso_chuyencan = tschuyencan, trongso_giuaki = tsgk, trongso_cuoiki = tsck, hocki_id = id_hocki
                WHERE monhoc_id = id_mon && sinhvien_id = Mssv && hocki_id = id_hocki;
                DELETE FROM ketquahoctap_tam
                WHERE kqht_id = Kqhttam_id;
            ELSE
            	SELECT COUNT(*) INTO total_lop FROM lophoc WHERE tenlop = Ten_lop;
            	IF total_lop = 1 THEN
            		set id_lop = (SELECT lophoc_id FROM lophoc WHERE tenlop = Ten_lop);  
            		INSERT INTO ketquahoctap (sinhvien_id, nganhhoc_id, lophoc_id, monhoc_id, chuyencan, giuaki, lan1, lan2, diemTB, trongso_chuyencan, trongso_giuaki, trongso_cuoiki, hocki_id) VALUES(Mssv,id_nganh,id_lop,id_mon,Chuyencan,Giuaki,Lan1,Lan2,DTB,tschuyencan,tsgk,tsck,id_hocki);
                DELETE FROM ketquahoctap_tam
                WHERE kqht_id = Kqhttam_id;
                ELSE
                	INSERT INTO lophoc (tenlop,monhoc_id)
                    VALUES(Ten_lop,id_mon);
                    SET id_lop =(SELECT lophoc_id FROM lophoc WHERE tenlop = Ten_lop);              	
            		INSERT INTO ketquahoctap (sinhvien_id, nganhhoc_id, lophoc_id, monhoc_id, chuyencan, giuaki, lan1, lan2, diemTB, trongso_chuyencan, trongso_giuaki, trongso_cuoiki, hocki_id) VALUES(Mssv,id_nganh,id_lop,id_mon,Chuyencan,Giuaki,Lan1,Lan2,DTB,tschuyencan,tsgk,tsck,id_hocki);
                DELETE FROM ketquahoctap_tam
                WHERE kqht_id = Kqhttam_id;   
                end if;
                end if;
                end if;
                end if;
                end if;
                end loop My_Loop;
                close Kqht_Cursor;
                end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phanquyen_id` int(1) NOT NULL COMMENT '1: Giáo Vụ 2: CTSV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `HoTen`, `username`, `password`, `phanquyen_id`) VALUES
(1, 'Nguyễn Thị Mạnh', 'admin', '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhdaotao`
--

CREATE TABLE `chuongtrinhdaotao` (
  `ctdt_id` int(11) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `nguoitao` varchar(100) NOT NULL,
  `ngaycapnhat` datetime NOT NULL,
  `nguoicapnhat` varchar(100) NOT NULL,
  `noidung` varchar(255) NOT NULL COMMENT 'lưu đường dẫn đến file nội dung',
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhdaotao`
--

INSERT INTO `chuongtrinhdaotao` (`ctdt_id`, `nganhhoc_id`, `khoahoc_id`, `ngaytao`, `nguoitao`, `ngaycapnhat`, `nguoicapnhat`, `noidung`, `ghichu`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'CTDT-K23T1.docx', 'Test 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkdoan`
--

CREATE TABLE `dkdoan` (
  `dkda_id` int(11) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL,
  `max_monno` int(11) NOT NULL,
  `moncam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dkdoan`
--

INSERT INTO `dkdoan` (`dkda_id`, `nganhhoc_id`, `khoahoc_id`, `max_monno`, `moncam`) VALUES
(10, 1, 2, 2, '1,2,3,4'),
(11, 1, 3, 1, '1,2,3,4'),
(12, 1, 4, 1, '1,2,3,4'),
(13, 5, 4, 3, '6,11,15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `drl`
--

CREATE TABLE `drl` (
  `drl_id` int(11) NOT NULL,
  `MSSV` varchar(11) NOT NULL DEFAULT '0',
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL DEFAULT '0',
  `hocky_id` int(11) NOT NULL DEFAULT '0',
  `diem` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `drl`
--

INSERT INTO `drl` (`drl_id`, `MSSV`, `nganhhoc_id`, `khoahoc_id`, `hocky_id`, `diem`) VALUES
(1, 'T121372', 1, 2, 1, 31),
(2, 'T137695', 1, 2, 1, 30),
(3, 'T137696', 1, 2, 1, 36),
(4, 'T137697', 1, 2, 1, 20),
(5, 'T137698', 1, 2, 1, 39),
(6, 'T137699', 1, 2, 1, 17),
(7, 'T121372', 1, 2, 2, 31),
(8, 'T137695', 1, 2, 2, 30),
(9, 'T137696', 1, 2, 2, 36),
(10, 'T137697', 1, 2, 2, 20),
(11, 'T137698', 1, 2, 2, 39),
(12, 'T137699', 1, 2, 2, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocbong`
--

CREATE TABLE `hocbong` (
  `sch_lowest_average` varchar(255) NOT NULL COMMENT 'Điểm trung bình thấp nhất',
  `sch_lowest_training` varchar(255) NOT NULL COMMENT 'Điểm rèn luyện thấp nhất'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocbong`
--

INSERT INTO `hocbong` (`sch_lowest_average`, `sch_lowest_training`) VALUES
('0', '30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `hocki_id` int(10) NOT NULL,
  `tenHocki` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`hocki_id`, `tenHocki`) VALUES
(1, 'Học kì 1'),
(2, 'Học kì 2'),
(3, 'Học kì 3'),
(4, 'Học kì 4'),
(5, 'Học kì 5'),
(6, 'Học kì 6'),
(7, 'Học kì 7'),
(8, 'Học kì 8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `hocphi_id` int(11) NOT NULL,
  `MSSV` varchar(20) NOT NULL,
  `hocphi_chinh` varchar(255) NOT NULL,
  `hocphi_hoclai` varchar(255) NOT NULL,
  `hocphi_tong` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`hocphi_id`, `MSSV`, `hocphi_chinh`, `hocphi_hoclai`, `hocphi_tong`, `noidung`) VALUES
(18, 'T126061', '0', '8,850,000', '8,850,000', '(Tính đến Học kỳ 2 - Năm học 2016-2017, số liệu cập nhật đến ngày 01/6/2017)'),
(19, 'T121372', '0', '5,240,000', '5,240,000', '(Tính đến Học kỳ 2 - Năm học 2016-2017, số liệu cập nhật đến ngày 01/6/2017)'),
(20, 'T123307', '0', '2,660,000', '2,660,000', '(Tính đến Học kỳ 2 - Năm học 2016-2017, số liệu cập nhật đến ngày 01/6/2017)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachdaotao`
--

CREATE TABLE `kehoachdaotao` (
  `khdt_id` int(11) NOT NULL,
  `monhoc_id` int(11) NOT NULL,
  `dvht_tc` int(11) NOT NULL,
  `tongso` int(11) NOT NULL,
  `lythuyet` int(11) NOT NULL,
  `baitap` int(11) NOT NULL,
  `thuchanh` int(11) NOT NULL,
  `baitaplon` int(11) NOT NULL,
  `doAn` int(11) NOT NULL,
  `khoaluan` int(11) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `hocki_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kehoachdaotao`
--

INSERT INTO `kehoachdaotao` (`khdt_id`, `monhoc_id`, `dvht_tc`, `tongso`, `lythuyet`, `baitap`, `thuchanh`, `baitaplon`, `doAn`, `khoaluan`, `nganhhoc_id`, `hocki_id`, `khoahoc_id`) VALUES
(1851, 1, 5, 75, 60, 15, 0, 0, 0, 0, 5, 1, 4),
(1852, 2, 5, 75, 75, 0, 0, 0, 0, 0, 5, 1, 4),
(1853, 3, 4, 60, 60, 0, 0, 0, 0, 0, 5, 1, 4),
(1854, 4, 3, 45, 30, 0, 0, 0, 0, 0, 5, 1, 4),
(1855, 5, 4, 75, 45, 0, 30, 0, 0, 0, 5, 1, 4),
(1856, 6, 5, 75, 45, 0, 30, 0, 0, 0, 5, 1, 4),
(1857, 7, 5, 75, 60, 15, 0, 0, 0, 0, 5, 2, 4),
(1858, 8, 5, 75, 75, 0, 0, 0, 0, 0, 5, 2, 4),
(1859, 9, 3, 45, 45, 0, 0, 0, 0, 0, 5, 2, 4),
(1860, 10, 4, 67, 67, 0, 0, 0, 0, 0, 5, 2, 4),
(1861, 11, 5, 90, 60, 0, 30, 0, 0, 0, 5, 2, 4),
(1862, 12, 6, 90, 60, 0, 30, 0, 0, 0, 5, 2, 4),
(1863, 13, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 4),
(1864, 14, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 4),
(1865, 15, 5, 75, 60, 15, 0, 0, 0, 0, 5, 3, 4),
(1866, 16, 3, 45, 45, 0, 0, 0, 0, 0, 5, 3, 4),
(1867, 17, 3, 45, 45, 0, 0, 0, 0, 0, 5, 3, 4),
(1868, 18, 4, 60, 0, 0, 0, 0, 0, 0, 5, 3, 4),
(1869, 19, 4, 60, 0, 0, 0, 0, 0, 0, 5, 3, 4),
(1870, 20, 6, 90, 60, 0, 30, 0, 0, 0, 5, 3, 4),
(1871, 21, 6, 90, 60, 0, 30, 0, 0, 0, 5, 3, 4),
(1872, 22, 0, 0, 0, 0, 0, 0, 0, 0, 5, 3, 4),
(1873, 23, 5, 75, 60, 15, 0, 0, 0, 0, 5, 4, 4),
(1874, 24, 4, 67, 67, 0, 0, 0, 0, 0, 5, 4, 4),
(1875, 25, 4, 75, 45, 0, 30, 0, 0, 0, 5, 4, 4),
(1876, 26, 4, 60, 60, 0, 0, 0, 0, 0, 5, 4, 4),
(1877, 27, 6, 90, 60, 0, 30, 0, 0, 0, 5, 4, 4),
(1878, 28, 6, 90, 60, 0, 30, 0, 0, 0, 5, 4, 4),
(1879, 29, 6, 90, 60, 0, 30, 0, 0, 0, 5, 4, 4),
(1880, 30, 0, 0, 0, 0, 0, 0, 0, 0, 5, 4, 4),
(1881, 31, 0, 0, 0, 15, 0, 0, 0, 0, 5, 5, 4),
(1882, 32, 3, 45, 45, 0, 0, 0, 0, 0, 5, 5, 4),
(1883, 33, 5, 90, 60, 0, 30, 0, 0, 0, 5, 5, 4),
(1884, 34, 6, 90, 60, 0, 30, 0, 0, 0, 5, 5, 4),
(1885, 35, 6, 90, 60, 0, 30, 0, 0, 0, 5, 5, 4),
(1886, 36, 6, 90, 60, 0, 30, 0, 0, 0, 5, 5, 4),
(1887, 37, 5, 75, 60, 15, 0, 0, 0, 0, 5, 6, 4),
(1888, 38, 3, 45, 45, 0, 0, 0, 0, 0, 5, 6, 4),
(1889, 39, 3, 45, 45, 0, 0, 0, 0, 0, 5, 6, 4),
(1890, 40, 6, 90, 60, 0, 30, 0, 0, 0, 5, 6, 4),
(1891, 41, 6, 90, 60, 0, 30, 0, 0, 0, 5, 6, 4),
(1892, 42, 6, 180, 0, 0, 0, 0, 0, 0, 5, 6, 4),
(1893, 43, 5, 75, 60, 15, 0, 0, 0, 0, 5, 7, 4),
(1894, 44, 6, 90, 45, 0, 45, 0, 0, 0, 5, 7, 4),
(1895, 45, 6, 90, 60, 0, 30, 0, 0, 0, 5, 7, 4),
(1896, 46, 20, 0, 0, 0, 0, 0, 0, 0, 5, 8, 4),
(1897, 1, 5, 75, 60, 15, 0, 0, 0, 0, 1, 1, 2),
(1898, 2, 5, 75, 75, 0, 0, 0, 0, 0, 1, 1, 2),
(1899, 3, 4, 60, 60, 0, 0, 0, 0, 0, 1, 1, 2),
(1900, 4, 3, 45, 30, 0, 0, 0, 0, 0, 1, 1, 2),
(1901, 5, 4, 75, 45, 0, 30, 0, 0, 0, 1, 1, 2),
(1902, 6, 5, 75, 45, 0, 30, 0, 0, 0, 1, 1, 2),
(1903, 7, 5, 75, 60, 15, 0, 0, 0, 0, 1, 2, 2),
(1904, 8, 5, 75, 75, 0, 0, 0, 0, 0, 1, 2, 2),
(1905, 9, 3, 45, 45, 0, 0, 0, 0, 0, 1, 2, 2),
(1906, 10, 4, 67, 67, 0, 0, 0, 0, 0, 1, 2, 2),
(1907, 11, 5, 90, 60, 0, 30, 0, 0, 0, 1, 2, 2),
(1908, 12, 6, 90, 60, 0, 30, 0, 0, 0, 1, 2, 2),
(1909, 13, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 2),
(1910, 14, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 2),
(1911, 15, 5, 75, 60, 15, 0, 0, 0, 0, 1, 3, 2),
(1912, 16, 3, 45, 45, 0, 0, 0, 0, 0, 1, 3, 2),
(1913, 17, 3, 45, 45, 0, 0, 0, 0, 0, 1, 3, 2),
(1914, 18, 4, 60, 0, 0, 0, 0, 0, 0, 1, 3, 2),
(1915, 19, 4, 60, 0, 0, 0, 0, 0, 0, 1, 3, 2),
(1916, 20, 6, 90, 60, 0, 30, 0, 0, 0, 1, 3, 2),
(1917, 21, 6, 90, 60, 0, 30, 0, 0, 0, 1, 3, 2),
(1918, 22, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 2),
(1919, 23, 5, 75, 60, 15, 0, 0, 0, 0, 1, 4, 2),
(1920, 24, 4, 67, 67, 0, 0, 0, 0, 0, 1, 4, 2),
(1921, 25, 4, 75, 45, 0, 30, 0, 0, 0, 1, 4, 2),
(1922, 26, 4, 60, 60, 0, 0, 0, 0, 0, 1, 4, 2),
(1923, 27, 6, 90, 60, 0, 30, 0, 0, 0, 1, 4, 2),
(1924, 28, 6, 90, 60, 0, 30, 0, 0, 0, 1, 4, 2),
(1925, 29, 6, 90, 60, 0, 30, 0, 0, 0, 1, 4, 2),
(1926, 30, 0, 0, 0, 0, 0, 0, 0, 0, 1, 4, 2),
(1927, 31, 0, 0, 0, 15, 0, 0, 0, 0, 1, 5, 2),
(1928, 32, 3, 45, 45, 0, 0, 0, 0, 0, 1, 5, 2),
(1929, 33, 5, 90, 60, 0, 30, 0, 0, 0, 1, 5, 2),
(1930, 34, 6, 90, 60, 0, 30, 0, 0, 0, 1, 5, 2),
(1931, 35, 6, 90, 60, 0, 30, 0, 0, 0, 1, 5, 2),
(1932, 36, 6, 90, 60, 0, 30, 0, 0, 0, 1, 5, 2),
(1933, 37, 5, 75, 60, 15, 0, 0, 0, 0, 1, 6, 2),
(1934, 38, 3, 45, 45, 0, 0, 0, 0, 0, 1, 6, 2),
(1935, 39, 3, 45, 45, 0, 0, 0, 0, 0, 1, 6, 2),
(1936, 40, 6, 90, 60, 0, 30, 0, 0, 0, 1, 6, 2),
(1937, 41, 6, 90, 60, 0, 30, 0, 0, 0, 1, 6, 2),
(1938, 42, 6, 180, 0, 0, 0, 0, 0, 0, 1, 6, 2),
(1939, 43, 5, 75, 60, 15, 0, 0, 0, 0, 1, 7, 2),
(1940, 44, 6, 90, 45, 0, 45, 0, 0, 0, 1, 7, 2),
(1941, 45, 6, 90, 60, 0, 30, 0, 0, 0, 1, 7, 2),
(1942, 46, 20, 0, 0, 0, 0, 0, 0, 0, 1, 8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachdaotao_tam`
--

CREATE TABLE `kehoachdaotao_tam` (
  `khdt_id` int(11) NOT NULL,
  `monhoc_id` varchar(10) NOT NULL,
  `TenMH` varchar(255) NOT NULL,
  `dvht_tc` int(11) NOT NULL,
  `tongso` int(11) NOT NULL,
  `lythuyet` int(11) NOT NULL,
  `baitap` int(11) NOT NULL,
  `thuchanh` int(11) NOT NULL,
  `baitaplon` int(11) NOT NULL,
  `doAn` int(11) NOT NULL,
  `khoaluan` int(11) NOT NULL,
  `nganhhoc_id` varchar(100) NOT NULL,
  `hocki_id` varchar(5) NOT NULL,
  `khoahoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquahoctap`
--

CREATE TABLE `ketquahoctap` (
  `kqht_id` int(11) NOT NULL,
  `sinhvien_id` varchar(10) NOT NULL,
  `nganhhoc_id` varchar(10) NOT NULL,
  `lophoc_id` varchar(10) NOT NULL,
  `monhoc_id` varchar(10) NOT NULL,
  `chuyencan` int(11) NOT NULL,
  `giuaki` int(11) NOT NULL,
  `lan1` int(11) NOT NULL,
  `lan2` int(11) NOT NULL,
  `diemTB` float NOT NULL,
  `trongso_chuyencan` int(11) NOT NULL,
  `trongso_giuaki` int(11) NOT NULL,
  `trongso_cuoiki` int(11) NOT NULL,
  `hocki_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ketquahoctap`
--

INSERT INTO `ketquahoctap` (`kqht_id`, `sinhvien_id`, `nganhhoc_id`, `lophoc_id`, `monhoc_id`, `chuyencan`, `giuaki`, `lan1`, `lan2`, `diemTB`, `trongso_chuyencan`, `trongso_giuaki`, `trongso_cuoiki`, `hocki_id`) VALUES
(89, 'T126061', '1', '5', '5', 0, 0, 0, 0, 4, 20, 30, 50, 1),
(90, 'T126062', '1', '5', '1', 0, 0, 0, 0, 10, 20, 30, 50, 1),
(91, 'T126063', '1', '5', '1', 0, 1, 2, 0, 10, 20, 30, 50, 1),
(92, 'T126064', '1', '5', '2', 0, 0, 0, 0, 10, 20, 30, 50, 1),
(93, 'T126066', '1', '6', '7', 2, 0, 0, 0, 10, 20, 30, 50, 2),
(94, 'T126061', '1', '5', '2', 0, 0, 0, 0, 10, 20, 30, 50, 1),
(95, 'T126062', '1', '5', '2', 0, 0, 0, 0, 10, 20, 30, 50, 1),
(96, 'T126063', '1', '5', '2', 0, 1, 2, 0, 10, 20, 30, 50, 1),
(97, 'T126066', '1', '6', '4', 2, 0, 0, 0, 10, 20, 30, 50, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquahoctap_tam`
--

CREATE TABLE `ketquahoctap_tam` (
  `kqht_id` int(11) NOT NULL,
  `sinhvien_id` varchar(10) NOT NULL,
  `ho` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `ngaysinh` varchar(100) NOT NULL,
  `nganhhoc_id` varchar(10) NOT NULL,
  `lophoc_id` varchar(10) NOT NULL,
  `monhoc_id` varchar(10) NOT NULL,
  `TenMH` varchar(100) NOT NULL,
  `chuyencan` int(11) NOT NULL,
  `giuaki` int(11) NOT NULL,
  `lan1` int(11) NOT NULL,
  `lan2` int(11) NOT NULL,
  `diemTB` float NOT NULL,
  `trongso_chuyencan` int(11) NOT NULL,
  `trongso_giuaki` int(11) NOT NULL,
  `trongso_cuoiki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `khoahoc_id` int(11) NOT NULL,
  `tenkhoa` varchar(255) NOT NULL,
  `nam_batdau` char(4) NOT NULL,
  `nam_ketthuc` char(4) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`khoahoc_id`, `tenkhoa`, `nam_batdau`, `nam_ketthuc`, `nganhhoc_id`) VALUES
(2, 'Khóa 3', '1111', '1111', 1),
(4, 'Khóa 1', '1111', '2222', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthi`
--

CREATE TABLE `lichthi` (
  `lichthi_id` int(11) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL,
  `hocki_id` int(11) NOT NULL,
  `lanthi` tinyint(1) NOT NULL,
  `ten_anh` varchar(255) NOT NULL,
  `ngay_cap_nhat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `lophoc_id` int(10) NOT NULL,
  `tenlop` varchar(10) NOT NULL,
  `monhoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`lophoc_id`, `tenlop`, `monhoc_id`) VALUES
(1, 'K20T01', 1),
(2, 'K20T02', 1),
(3, 'K19T02', 1),
(4, 'K20T03', 1),
(5, 'K22T01', 1),
(6, 'K22T02', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `monhoc_id` int(11) NOT NULL,
  `MaMH` char(7) NOT NULL,
  `TenMH` varchar(100) NOT NULL,
  `lophoc_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`monhoc_id`, `MaMH`, `TenMH`, `lophoc_id`) VALUES
(1, 'THH01', 'Anh văn 1', ''),
(2, 'THH02', 'Toán Cao Cấp 1', ''),
(3, 'THH03', 'Vật Lý 1', ''),
(4, 'THH04', 'Những NLCB của CN Mac-Lenin (HP 1)', ''),
(5, 'THH05', 'Nhập môn máy tính', ''),
(6, 'THH06', 'Introduction to Software Engineering', ''),
(7, 'THH07', 'Anh văn 2', ''),
(8, 'THH08', 'Toán Cao Cấp 2', ''),
(9, 'THH09', 'Vật Lý 2', ''),
(10, 'THH10', 'Những NLCB của CN Mac-Lenin (HP 2)', ''),
(11, 'THH11', 'Fundamentals of Computing 1', ''),
(12, 'THH12', 'Introduction to Networks & Communication', ''),
(13, 'THH13', 'Giáo dục thể chất 1', ''),
(14, 'THH14', 'Giáo dục quốc phòng', ''),
(15, 'THH15', 'Anh văn 3', ''),
(16, 'THH16', 'Tư tưởng Hồ Chí Minh', ''),
(17, 'THH17', 'Kinh tế học đại cương', ''),
(18, 'THH18', 'Toán rời rạc', ''),
(19, 'THH19', 'Toán Cao cấp 3', ''),
(20, 'THH20', 'Application Development Pracitices (for SE)', ''),
(21, 'THH21', 'Fundamentals of Computing 2', ''),
(22, 'THH22', 'Giáo dục thể chất 2', ''),
(23, 'THH23', 'Anh văn 4', ''),
(24, 'THH24', 'Đường lối cách mạng của Đảng cộng sản VN', ''),
(25, 'THH25', 'Cơ sở dữ liệu (Introduction to Database)', ''),
(26, 'THH26', 'Xác suất thống kê (Introduction to Probability and Statistic)', ''),
(27, 'THH27', 'Object Oriented Programming and C++', ''),
(28, 'THH28', 'Software Testing (Verification & Validation)', ''),
(29, 'THH29', 'Requirements Engineering', ''),
(30, 'THH30', 'Giáo dục thể chất 3', ''),
(31, 'THH31', 'Anh văn 5', ''),
(32, 'THH32', 'Nguyên lý kế toán', ''),
(33, 'THH33', 'Group Dynamics & Communication', ''),
(34, 'THH34', 'Phân tích thiết kế hướng đối tượng', ''),
(35, 'THH35', 'Computer science for practicing Engineers', ''),
(36, 'THH36', 'Software Project Manegement', ''),
(37, 'THH37', 'Anh văn 6', ''),
(38, 'THH38', 'Pháp luật đại cương', ''),
(39, 'THH39', 'Quản trị doanh nghiệp', ''),
(40, 'THH40', 'Software Measurements & Analysis', ''),
(41, 'THH41', 'Software Architecture & Design', ''),
(42, 'THH42', 'Software Project ', ''),
(43, 'THH43', 'Anh văn 7', ''),
(44, 'THH44', 'Chuyên đề (1)', ''),
(45, 'THH45', 'Software Processes & Quality Management', ''),
(46, 'THH46', 'Capstone Project (2)', ''),
(49, 'THH50', 'Capstone Project (2)', ''),
(52, 'THH55', 'Anh văn 45', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `nganhhoc_id` int(11) NOT NULL,
  `ma_nganhhoc` varchar(10) NOT NULL,
  `tennganh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nganhhoc`
--

INSERT INTO `nganhhoc` (`nganhhoc_id`, `ma_nganhhoc`, `tennganh`) VALUES
(1, 'TH', 'Kỹ thuật phần mềm'),
(5, 'QTM', 'Quản Trị Mạng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `phanquyen_id` int(11) NOT NULL,
  `phanquyen_loai` int(11) NOT NULL COMMENT '0: Sinh viên 1: Giáo Vụ 2: CTSV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`phanquyen_id`, `phanquyen_loai`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` char(7) NOT NULL,
  `Ho` varchar(100) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Phai` varchar(5) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tinhtrang` int(11) NOT NULL COMMENT '0: đang học 1: tạm ngưng 2: đình chỉ 3: bảo lưu',
  `LiDo` varchar(255) NOT NULL,
  `Ngaysinh` varchar(50) NOT NULL,
  `phanquyen_id` int(11) NOT NULL COMMENT '0: Sinh viên 1: Giáo Vụ 2: CTSV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `Ho`, `Ten`, `username`, `password`, `Phai`, `nganhhoc_id`, `khoahoc_id`, `SDT`, `Email`, `Tinhtrang`, `LiDo`, `Ngaysinh`, `phanquyen_id`) VALUES
('T126061', 'Ngo', 'A', '', '', '', 1, 2, '', '', 0, '', '', 0),
('T126062', 'Nguyễn', 'B', '', '', '', 1, 2, '', '', 0, '', '', 0),
('T126063', 'Lê', 'C', '', '', '', 1, 2, '', '', 0, '', '', 0),
('T126064', 'Trần', 'D', '', '', '', 1, 2, '', '', 0, '', '', 0),
('T126066', 'Trịnh', 'F', '', '', '', 1, 2, '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `thoikhoabieu_id` int(11) NOT NULL,
  `nganhhoc_id` int(11) NOT NULL,
  `khoahoc_id` int(11) NOT NULL,
  `hocki_id` int(11) NOT NULL,
  `ten_anh` varchar(255) NOT NULL,
  `ngay_cap_nhat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`thoikhoabieu_id`, `nganhhoc_id`, `khoahoc_id`, `hocki_id`, `ten_anh`, `ngay_cap_nhat`) VALUES
(1, 5, 4, 1, '001.jpg', '21/11/2017');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `chuongtrinhdaotao`
--
ALTER TABLE `chuongtrinhdaotao`
  ADD PRIMARY KEY (`ctdt_id`);

--
-- Chỉ mục cho bảng `dkdoan`
--
ALTER TABLE `dkdoan`
  ADD PRIMARY KEY (`dkda_id`);

--
-- Chỉ mục cho bảng `drl`
--
ALTER TABLE `drl`
  ADD PRIMARY KEY (`drl_id`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`hocki_id`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`hocphi_id`);

--
-- Chỉ mục cho bảng `kehoachdaotao`
--
ALTER TABLE `kehoachdaotao`
  ADD PRIMARY KEY (`khdt_id`);

--
-- Chỉ mục cho bảng `kehoachdaotao_tam`
--
ALTER TABLE `kehoachdaotao_tam`
  ADD PRIMARY KEY (`khdt_id`);

--
-- Chỉ mục cho bảng `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  ADD PRIMARY KEY (`kqht_id`);

--
-- Chỉ mục cho bảng `ketquahoctap_tam`
--
ALTER TABLE `ketquahoctap_tam`
  ADD PRIMARY KEY (`kqht_id`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`khoahoc_id`);

--
-- Chỉ mục cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD PRIMARY KEY (`lichthi_id`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`lophoc_id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`monhoc_id`);

--
-- Chỉ mục cho bảng `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`nganhhoc_id`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`phanquyen_id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`thoikhoabieu_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chuongtrinhdaotao`
--
ALTER TABLE `chuongtrinhdaotao`
  MODIFY `ctdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dkdoan`
--
ALTER TABLE `dkdoan`
  MODIFY `dkda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `drl`
--
ALTER TABLE `drl`
  MODIFY `drl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hocki`
--
ALTER TABLE `hocki`
  MODIFY `hocki_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  MODIFY `hocphi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `kehoachdaotao`
--
ALTER TABLE `kehoachdaotao`
  MODIFY `khdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1943;

--
-- AUTO_INCREMENT cho bảng `kehoachdaotao_tam`
--
ALTER TABLE `kehoachdaotao_tam`
  MODIFY `khdt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  MODIFY `kqht_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `ketquahoctap_tam`
--
ALTER TABLE `ketquahoctap_tam`
  MODIFY `kqht_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `khoahoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  MODIFY `lichthi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `lophoc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `monhoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `nganhhoc`
--
ALTER TABLE `nganhhoc`
  MODIFY `nganhhoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `phanquyen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  MODIFY `thoikhoabieu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
