<?php
    function rupiah($angka){
        if(@$angka!=NULL):
            $hasil_rupiah = number_format($angka,0,',','.');
        else:
            $hasil_rupiah = 0;
        endif;
        return $hasil_rupiah;
    }