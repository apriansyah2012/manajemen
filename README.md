# Khanza-Lite
Khanza Lite Ini adalah Versi Custom dari Khanza Lite 1, di sesuaikan dengan RS saya

Catatan :
Mapping Kategori Penjamin/Cara Bayar (Sesuaikan dengan Keadaan di tempat Masing-masing) dengan menambahkan Query dibawah ini di dalam database :

"ALTER TABLE penjab  ADD COLUMN kategori enum('ASURANSI','PERUSAHAAN','TUNAI','BPJS','BPJSTK','JAMSOS','KEMKES','DLL') AFTER attn"

