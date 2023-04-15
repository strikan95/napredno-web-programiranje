# Napredno Web Programiranje - LV 3/4
## Zadatak
1. Napravite novu Laravel instalaciju koja će biti u direktoriju projekti. Aplikacija treba imati
mogućnost registracije novih korisnika (korisnici se sami registriraju). Korisnici se moraju moći
prijaviti i odjaviti.

2. Potrebno je napraviti novu migraciju za tablicu projects u kojoj će korisnici voditi evidenciju svojih
projekata. Projekt treba imati atribute naziv projekta, opis projekta, cijena projekta, obavljeni
poslovi, datum početka i datum završetka.

3. Na svaki projekt se može dodati više članova projektnog tima koji će raditi na projektu (članovi
time dobivaju se sa popisa korisnika koji su se registrirali u aplikaciji). Voditelj projekta će biti
osoba koja je otvorila projekt.

4. Na svom profilu svaki korisnik vidi projekte koje je otvorio (projekte na kojima je voditelj), te
projekte na kojega je dodan kao član projektnog tima.

5. Voditelj projekta može mijenjati sve podatke na projektu, a članovi projektnog tima samo atribut
obavljeni poslovi.

## Pokretanje

1. Pokrenuti docker kontejnere
```
make build-up
```
2. Otvoriti link [http://127.0.0.1:8080](http://127.0.0.1:8080)
3. Prijaviti se sa računom
```
Username: usr1@mail.com
Password: password
```

## Slike
![Dashboard](https://github.com/strikan95/napredno-web-programiranje/blob/master/projekti/slike/dasboard.png?raw=true)
![Project Page](https://github.com/strikan95/napredno-web-programiranje/blob/master/projekti/slike/project_page.png?raw=true)
![Create Project Page](https://github.com/strikan95/napredno-web-programiranje/blob/master/projekti/slike/create_project_page.png?raw=true)
![Edit Project Page](https://github.com/strikan95/napredno-web-programiranje/blob/master/projekti/slike/edit_project_page.png?raw=true)
![Add Collaborators Page](https://github.com/strikan95/napredno-web-programiranje/blob/master/projekti/slike/add_collaborator_page.png?raw=true)

## Autor
Juraj Buljević 
