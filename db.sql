SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- membuat basis data dengan create serta atributnya
CREATE TABLE mhs (
  nim bigint(10) NOT NULL,
  nama varchar(50) NOT NULL,
  prodi varchar(50) NOT NULL,
  email varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Deklarasi primary key
ALTER TABLE mhs
  ADD PRIMARY KEY (nim);

-- menambahkan data ke querry
INSERT INTO mhs (nim, nama, prodi, email) VALUES
('0000000001', 'Ari Suhandri', 'IF', 'ari.suhandri@example.com'),
('0000000002', 'Alina Ardhini', 'IF', 'alina.ardhini@example.com'),
('0000000003', 'Arisanti Rahayu', 'IF', 'arisanti.rahayu@example.com'),
('0000000004', 'Anas Supriyadi', 'IF', 'anas.supriyadi@example.com'),
('0000000005', 'Alia Hariyah', 'IF', 'alia.hariyah@example.com'),
('0000000006', 'Andre Rama', 'SD', 'andre.rama@example.com'),
('0000000007', 'Ardita Amelia', 'SD', 'ardita.amelia@example.com'),
('0000000008', 'Anas Widodo', 'SD', 'anas.widodo@example.com'),
('0000000009', 'Aryani Ade Wijaya', 'SD', 'aryani.ade@example.com'),
('0000000010', 'Anisia Suyatna', 'SD', 'anisia.suyatna@example.com'),
('0000000046', 'Ajeng Astriani', 'IF', 'ajeng.astriani@example.com'),
('0000000047', 'Afia Triwanti', 'IF', 'afia.triwanti@example.com'),
('0000000048', 'Alvi Erlangga', 'IF', 'alvi.erlangga@example.com'),
('0000000049', 'Anis Ajib', 'IF', 'anis.ajib@example.com'),
('0000000050', 'Alwis Djajadi', 'IF', 'alwis.djajadi@example.com');


COMMIT;
