-- Membuat database
CREATE DATABASE IF NOT EXISTS data_mahasiswa;
-- Membuat database baru dengan nama 'data_mahasiswa' jika belum ada sebelumnya

-- Menggunakan database
USE data_mahasiswa;
-- Mengatur database 'data_mahasiswa' sebagai database aktif yang akan digunakan untuk menjalankan query berikutnya

-- Membuat tabel mahasiswa
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    -- Kolom 'id' sebagai primary key dengan tipe data INT, dan nilainya akan bertambah otomatis untuk setiap data baru
    nama VARCHAR(50) NOT NULL, 
    -- Kolom 'nama' dengan tipe data VARCHAR (maksimal 50 karakter) yang wajib diisi
    nilai INT NOT NULL
    -- Kolom 'nilai' dengan tipe data INT yang wajib diisi untuk menyimpan nilai mahasiswa
);

-- Menambahkan kolom tambahan ke tabel mahasiswa
ALTER TABLE mahasiswa 
ADD email VARCHAR(100) NOT NULL, 
-- Menambahkan kolom 'email' dengan tipe data VARCHAR (maksimal 100 karakter) yang wajib diisi
ADD alamat VARCHAR(255) NOT NULL;
-- Menambahkan kolom 'alamat' dengan tipe data VARCHAR (maksimal 255 karakter) yang wajib diisi

-- Memasukkan data baru ke tabel mahasiswa
INSERT INTO mahasiswa (nama, nilai, email, alamat) VALUES
('Alice', 85, 'alice@mail.com', 'Jl. Mawar No. 1'), 
-- Menambahkan data mahasiswa dengan nama 'Alice', nilai 85, email 'alice@mail.com', dan alamat 'Jl. Mawar No. 1'
('Bob', 90, 'bob@mail.com', 'Jl. Melati No. 2'), 
-- Menambahkan data mahasiswa dengan nama 'Bob', nilai 90, email 'bob@mail.com', dan alamat 'Jl. Melati No. 2'
('Charlie', 75, 'charlie@mail.com', 'Jl. Anggrek No. 3'),
-- Menambahkan data mahasiswa dengan nama 'Charlie', nilai 75, email 'charlie@mail.com', dan alamat 'Jl. Anggrek No. 3'
('David', 88, 'david@mail.com', 'Jl. Kenanga No. 4'),
-- Menambahkan data mahasiswa dengan nama 'David', nilai 88, email 'david@mail.com', dan alamat 'Jl. Kenanga No. 4'
('Eve', 92, 'eve@mail.com', 'Jl. Tulip No. 5'),
-- Menambahkan data mahasiswa dengan nama 'Eve', nilai 92, email 'eve@mail.com', dan alamat 'Jl. Tulip No. 5'
('Frank', 70, 'frank@mail.com', 'Jl. Kamboja No. 6'),
('Grace', 95, 'grace@mail.com', 'Jl. Dahlia No. 7'),
('Hank', 60, 'hank@mail.com', 'Jl. Bougenville No. 8'),
('Ivy', 80, 'ivy@mail.com', 'Jl. Teratai No. 9'),
('Jack', 85, 'jack@mail.com', 'Jl. Sakura No. 10'),
('Kate', 78, 'kate@mail.com', 'Jl. Cempaka No. 11'),
('Liam', 88, 'liam@mail.com', 'Jl. Seruni No. 12'),
('Mona', 84, 'mona@mail.com', 'Jl. Nusa Indah No. 13'),
('Noah', 87, 'noah@mail.com', 'Jl. Seroja No. 14'),
('Olivia', 93, 'olivia@mail.com', 'Jl. Alamanda No. 15'),
('Paul', 76, 'paul@mail.com', 'Jl. Flamboyan No. 16'),
('Quincy', 89, 'quincy@mail.com', 'Jl. Lily No. 17'),
('Rachel', 82, 'rachel@mail.com', 'Jl. Anyelir No. 18'),
('Sam', 74, 'sam@mail.com', 'Jl. Rambutan No. 19'),
('Tina', 86, 'tina@mail.com', 'Jl. Mangga No. 20'),
('Uma', 79, 'uma@mail.com', 'Jl. Apel No. 21'),
('Victor', 83, 'victor@mail.com', 'Jl. Melon No. 22'),
('Wanda', 81, 'wanda@mail.com', 'Jl. Durian No. 23'),
('Xander', 72, 'xander@mail.com', 'Jl. Jambu No. 24'),
('Yara', 77, 'yara@mail.com', 'Jl. Sawo No. 25');
-- Memasukkan data mahasiswa lainnya ke tabel dengan format nama, nilai, email, dan alamat
