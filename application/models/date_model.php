<?php
class Date_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Tarih formatlama işlevi
    public function format_tarih($tarih) {
        $date = new DateTime($tarih);
        $yeni_format = $date->format('F j, Y');

        // Türkçe ay isimleri için çeviri
        $aylar = array(
            'January' => 'Ocak',
            'February' => 'Şubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'Mayıs',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'Ağustos',
            'September' => 'Eylül',
            'October' => 'Ekim',
            'November' => 'Kasım',
            'December' => 'Aralık'
        );

        $ay_ingilizce = $date->format('F');
        $ay_turkce = $aylar[$ay_ingilizce];

        return str_replace($ay_ingilizce, $ay_turkce, $yeni_format);
    }

    // Veritabanından tarih almayı simüle eden işlev
    public function get_tarih($tarih) {
        // Burada veritabanından aldığınız tarihi döndürüyorsunuz
        // Bu örnekte sabit bir tarih kullanıyoruz
        return $this->format_tarih($tarih);
    }
}
