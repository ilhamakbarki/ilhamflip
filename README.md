# Ujian Flip

Membuat Service Auto Kirim Rekening

1. Untuk mengakses menggunakan Cloud dapat diakses di Link :
https://ilhamflip.herokuapp.com/withdraw/service

2. Untuk PHP CLI sebagai berikut :
cd "path/project"
php index.php withdraw service


Table Database
~ log_error
	- id bigint(20)
	- log_error longtext
	- timestamp datetime

~ withdraw_req
	- id bigint(20)
	- customer_id bigint(20)
	- bank_code varchar(5)
	- account_number varchar(50)
	- amount float
	- remark varchar(500)
	- status varchar(50)
	- timestamp datetime
	- beneficiary_name varchar(255)
	- receipt varchar(255)
	- time_served datetime
	- fee float
	- serialid bigint(20)

Proses Services
1. Untuk melakukan Permintaan Pengiriman Uang Status Awal Input data pada Table withdraw_req dengan status 'REQUEST' 
2. Jalankan Link Service
3. Service akan mengupdate semua Data REQUEST Withdraw berdasarkan response dari API pihak ke 3 Flip.
