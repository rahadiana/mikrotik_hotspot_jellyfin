
# mikrotik hotspot jellyfin
Script integrasi jellyfin dan mikrotik hotspot, Dengan Script Ini Anda Dapat Menambahkan User Mikrotik Yang Sama Dengan User Pada Jellyfin Dengan Otomatis. 


<iframe width="560" height="315" src="https://www.youtube.com/embed/-AjP_Egjsos" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

# Setting Jellyfin Dengan Nginx Reverse Proxy

Setelah Anda Menginstall Jellyfin Anda Dapat Mengaksesnya Di http://localhost:8096/ 
Dan Anda Telah Menginstall Nginx.
Anda Dapat Menambahkan Konfigurasi Nginx Sebagai Reverse Proxy
Tambahkan Skrip Konfig Ini : https://bit.ly/2YLELrn .
Pada :
> /etc/nginx/sites-available/default

Save , lalu tuliskan pada terminal dan enter.

    service nginx reload

Kemudian Akses Kembali Di Browser Menggunakan Nama Domain Anda
[http://nama_domain_anda.tld/](http://nama_domain_anda.tld/) 

Pastikan Nama_Domain_Anda Telah  Dikenali Di Public Dns Atau Tambahkan Di Dns Static Pada Router Anda.
 
Jika Tampil Halaman Jellyfin Maka Settingan Sudah Benar.

lihat Juga :
Cara install Lemp Stack Ubuntu/ Armbian: 
https://www.youtube.com/playlist?list=PLqtv1GVajB2qyZwvHiXN7vEJc-SL2idIa

Cara Optimalisasi Web Server Nginx :
https://youtu.be/Arkio-8T3W8

