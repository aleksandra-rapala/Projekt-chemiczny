# MyChemical

Dokumentacja aplikacji „MyChemical”

Aplikacja jest przeznaczona dla młodych ludzi uczących się chemii.
Dzięki niej można mieć zawsze pod ręką ulubione tablice chemiczne lub przydatne kalkulatory poprzez dawanie serduszek.
Dodatkowo jest możliwość dodawania reakcji chemicznych.

Aplikacja posiada dwa typy rodzajów kont: użytkownik oraz administrator.

Użytkownik posiada funkcjonalności:

-> przeglądać i wyszukiwać w "My board" polikowane tablice, kalkulatory oraz dodane reakcje chemiczne

-> przeglądać kalkulatory oraz tablice

-> dodawać reakcje chemiczne

Administrator posiada funkcjonalności:

-> dodawać nowe tablice

-> przeglądać kalkulatory oraz tablice (bez możliwości likowania)

                        Home - Strona główna aplikacji
![Zrzut ekranu #1](https://github.com/aleksandra-rapala/MyChemical/blob/92ca31b614b1249f1f15ff133601855d94cb68b5/Screen_widok_webowy/screen1.png)

                        Logowanie
![Zrzut ekranu #2](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen2.png)

                        Rejestracja z walidacją danych
![Zrzut ekranu #3](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen4.png)



            My board użytkownika - z możliwością wyszukiwania polikowanych przez użytkownika tablic, kalkulatorów oraz stworzonych reakcji
![Zrzut ekranu #4](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen5.png)

            Kalkulatory - z możliwością polikowania danego kalkulatora
![Zrzut ekranu #5](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen8.png)
![Zrzut ekranu #6](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen9.png)

            Tablice - z możliwością polikowania danej tablicy
![Zrzut ekranu #7](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen6.png)
![Zrzut ekranu #8](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen7.png)

            Account - swoje konto z widocznym emailem zalogowanego użytkownika (w przyszłości można zrobić np. usuwanie konta)
![Zrzut ekranu #9](https://github.com/aleksandra-rapala/MyChemical/blob/2eb9cbc6016f9a76b0495e8aed8af2c14769fdc2/Screen_widok_webowy/screen10.png)

            Zakładka Add reactions pozwala użytkownikowi dodawać do swojej My board reakcje chemiczne
![Zrzut ekranu #10](https://github.com/aleksandra-rapala/MyChemical/blob/bfc4612d07bdd7261f3efc56fff16c07b536d23b/Screen_widok_webowy/screen13.png)


        Administrator posiada inną zakładkę My board- z możliwością dodawania tablic (Administrator nie posiada zakładki Add reactions)
![Zrzut ekranu #11](https://github.com/aleksandra-rapala/MyChemical/blob/ce3696b92753eb4971291719277ded7b579dc302/Screen_widok_webowy/screen11.png)
            
            Administrator nie posiada również możliwości likowania
![Zrzut ekranu #12](https://github.com/aleksandra-rapala/MyChemical/blob/804bd92e1a4b5b64f26b822e902b04809941608f/Screen_widok_webowy/screen12.png)            


1. DOKUMENTACJE W README.MD
2. KOD NAPISANY OBIEKTOWO (CZĘŚĆ BACKENDOWA)
3. DIAGRAM ERD -> [Wygenerowany diagram ERD](https://github.com/aleksandra-rapala/MyChemical/blob/55f3425225ba1b85443da9280fc46082e38a4173/diagram_bazy_danych_navicat.pdf)
7. GIT - commity, a wersja ostateczna jest zmergowana do gałęzi main.
8. REALIZACJA TEMATU -> Temat projektu zgodny z przesłanym zgłoszeniem, funkcjonalność projektu została pokryta w co najmniej ~60%.
9. HTML - niektóre widoki zostały umieszczone w szablonach, aby nie replikować kodu, np. <?php include('footer.php') ?> 
[Przykład](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/views/home.php#L12)
10. POSTGRESQL -> Połączenie z bazą PostgreSQL, stosowano odpowiednie typy, połączenia przez PDO itd.
11. ZŁOŻONOŚĆ BAZY DANYCH -> Baza danych zawiera wszystkie typy relacji, co widać na wygenerowanym diagramie ERD
[Wygenerowany diagram ERD](https://github.com/aleksandra-rapala/MyChemical/blob/55f3425225ba1b85443da9280fc46082e38a4173/diagram_bazy_danych_navicat.pdf)
12. PHP -> Wersja języka PHP co najmniej 7.4, użyto funkcji wbudowanych w PHP oraz bardzo dobra umiejętność posługiwania się składnią.
13. JAVA SCRIPT
    Zastosowanie języka Javascript w utworzeniu
    → walidacji formularzy [Przy rejestracji](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/js/valid_register.js#L1)
    → zapytań Fetch API [Przy dawaniu serduszek](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/js/heart.js#L30)
    → do tworzenia, pobierania oraz manipulowania elementami DOM [np. przy tworzeniu kalkulatora Molar Mass](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/js/molar_mass.js#L2)
11. FETCH API (AJAX) -> Zastosowanie Fetch API z użyciem metody POST oraz GET. Przetworzenie otrzymanych danych z serwera w blokach then(). 
[Przy wyszukiwaniu w search-bar](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/js/search.js#L20)
12. DESIGN -> Projekt utrzymany jest w starannej i czytelnej stylistyce. Stosowane są klasy CSS, brak mieszania styli w plikach HTML. Kod CSS jest czytelny i poprawny. [Przykład czytelnego kodu Css](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/css/style.css#L1)
13. RESPONSYWNOŚĆ 
![Zrzut ekranu](https://github.com/aleksandra-rapala/MyChemical/blob/47442d1ee2ae338adc652951d0a562a92c39fd8e/Screeny_widok_mobilny/screen1.png)

-> Zaprezentowano co najmniej 5 widoków responsywnych, działających pod różne urządzanie wybrane z Narzędzi Deweloperskich przeglądarki. Zastosowano CSS media queries. 
[Media queries](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/public/css/style.css#L167)

14. LOGOWANIE -> Proces logowania użytkowników w oparciu o bazę danych, zastosowanie odpowiedniego mapowania i weryfikacji. 
[Logowanie](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/controllers/SecurityController.php#L22)
15. SESJA UŻYTKOWNIKA
    Sesja zostaje utrzymana, aż do wylogowania użytkownika. Zastosowano $_SESSION, jak i również  $_COOKIE.
 [$_SESSION](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/controllers/SecurityController.php#L37)
[$_COOKIE](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/repository/UserRepository.php#L63)
16. UPRAWNIENIA UŻYTKOWNIKÓW -> Uprawnienia użytkowników są weryfikowane przez system w trakcie działania aplikacji. 
[Przykład weryfikacji uprawnień w Routing.php](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/Routing.php#L43)
17. ROLE UŻYTKOWNIKÓW -> Aplikacja posiada przypisane role dla użytkowników - dwa typy ról: zwykły użytkownik oraz administrator.
18. WYLOGOWYWANIE -> Usunięto sesję/ ciasteczka przy wylogowaniu użytkownika oraz zaktualizowano bazę danych. 
[Wylogowanie](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/controllers/SecurityController.php#L56)
[Usuwanie ciasteczka](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/repository/UserRepository.php#L74)
19. WIDOKI w bazie danych    -> [Przykład widoku uzytego w zapytaniu select](https://github.com/aleksandra-rapala/MyChemical/blob/fc08a0d806141ace7d01399db6b0de453803065e/src/repository/TableRepository.php#L124)
20. AKCJE NA REFERENCJACH -> W zapytaniach stosowane są JOINY, odwołanie się do relacyjnych tabel. [Przykład joina](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/repository/CalculatorRepository.php#L86)
21. BEZPIECZEŃSTWO -> Hasła są hashowane (dodatkowo zastosowano sól). Dostęp do zawartości dla zalogowanych użytkowników nie jest osiągalny bez autoryzacji.
[Hashowanie przy użyciu soli](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/src/controllers/SecurityController.php#L97)
22. BRAK REPLIKACJI KODU -> Starałam się, aby kod nie był replikowany.
23. CZYSTOŚĆ I PRZEJRZYSTOŚĆ KODU -> Zachowano czystość i przejrzystość kodu.
24. BAZA DANYCH ZRZUCONA DO PLIKU .SQL
    Pobrałam kopię bazy danych wyeksportowaną do pliku .sql, który umieściłam w repozytorium. [Plik sql](https://github.com/aleksandra-rapala/MyChemical/blob/400e5f142022479d12d0dc2f9ab5c5de185c7033/mychemical_baza_danych.sql#L1)
   
   Wykorzystane technologie

    PHP 7.4, CSS, HTM, JavaScript, PostgreSQL

