-- Jobsheet 8: skema awal database opentrip (PostgreSQL)
-- Jalankan setelah membuat database, misal:
--   createdb opentrip
--   psql -d opentrip -f sql/01_pemandu_paket.sql

CREATE TABLE paket (
    id SERIAL PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    ketinggian VARCHAR(50) NOT NULL,
    harga NUMERIC(12, 2) NOT NULL,
    tanggal DATE NOT NULL,
    terisi INT DEFAULT 0,
    kuota INT NOT NULL,
    status VARCHAR(20) DEFAULT 'Buka',
    poster TEXT
);

CREATE TABLE pemandu (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    lisensi VARCHAR(100) NOT NULL,
    spesialis VARCHAR(255) NOT NULL,
    foto TEXT
);  