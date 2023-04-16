# Webterv
## Koncepció
A projekt egy fiktív kutyamenhelynek a weboldala.

## Struktúra
A weboldal áll 1db CSS állományból (styles.css), és 5db HTML fájlból. Az index.html-ben a főoldal található.

A 2. mérföldő PHP-s feladatai a webshop.html fájlban lesznek megvalósítva, ezért jelenleg az oldal még üres.

## Referenciák, weboldalak, amikből ötleteket merítettünk
www.adaptics.hu/

https://rex.hu/

www.lelenc.hu/

## Backend
A weboldalhoz tartozó PHP kódok az /php/ mappában találhatóak.

A MySQL exportált adatbázis (kutyamenhely) az /etc/ mappában található, kutyamenhely.sql néven.

A kutyamenhely adatbázisban vannak előre megadott fiókok, adatok, hírek. A fiókok belépési adatai az /etc/felhasznaloAdatok.txt fájlban vannak (a fájl NEM a regisztráció utáni fiókok automatikus eltárolására van, azt a MySQL csinálja).

PHP-val meg van valósítva a bejelentkezés, regisztráció, meglévő adatok megváltoztatása, adatok láthatósága (privát/publikus), fiók törlése, üzenetküldés, az admin/user jogosultság (adminok tudnak cikkeket írni, és felhasználókat törölni), felhasználók keresése, azok publikus adatainak megjelenítése.

Az oldalak közötti navigáció sessionnel van segítve/hárítva. A $_SESSION tömbben el van tárolva a személy felhasználóneve, és a users táblában használt id-ja.
