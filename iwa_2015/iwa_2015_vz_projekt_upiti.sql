#odabir svih korisnika
SELECT * FROM korisnik

#odabir svih udruga
SELECT * FROM udruga

#opci podaci i aktivnosti udruga_id 1
SELECT u.naziv, u.opis, a.naziv FROM aktivnost a, udruga u 
WHERE u.udruga_id = a.udruga_id AND u.udruga_id = 1

#odabir korisnika imena Jason filtriran na bazi imena i tipa korisnika
SELECT * FROM korisnik WHERE ime='Jason' ORDER BY ime, tip_id

#odabir svih moderatora
SELECT * FROM korisnik WHERE tip_id=1

#odabir svih aktivnosti iz udruge 1
SELECT * FROM aktivnost WHERE udruga_id = 1 

#odabir svih udruga koje smije moderirati moderator 2
SELECT * FROM udruga WHERE moderator_id = 2

#odabir svih aktivnosti udruge koje smije moderairati moderator 2
SELECT * FROM aktivnost a, udruga u 
WHERE u.udruga_id = a.udruga_id AND u.moderator_id = 2

#broj aktivnosti po pojedinom korisniku
SELECT count(*), k.korisnicko_ime FROM korisnik k, sudionik s 
WHERE k.korisnik_id = s.korisnik_id
GROUP BY s.korisnik_id 

#broj aktivnosti po pojedinoj udruzi
SELECT count(*), u.naziv FROM aktivnost a, udruga u
WHERE u.udruga_id=a.udruga_id
GROUP BY a.udruga_id

# popis svih sudionika na aktivnosti
SELECT k.korisnicko_ime, a.naziv FROM korisnik k, sudionik s, aktivnost a
WHERE k.korisnik_id = s.korisnik_id AND s.aktivnost_id = a.aktivnost_id

#popis svih aktivnosti iz udruge za korisnika 8 sortirano po nazivu udruge
SELECT * FROM aktivnost a, udruga u, sudionik s 
WHERE s.aktivnost_id=a.aktivnost_id AND a.udruga_id=u.udruga_id 
AND s.korisnik_id = 8 
ORDER BY u.naziv

#popis svih aktivnosti iz udruge za korisnika 8 sortirano po datutmu i vremenu odrzavanja aktivnosti
SELECT * FROM aktivnost a, udruga u, sudionik s 
WHERE s.aktivnost_id=a.aktivnost_id AND a.udruga_id=u.udruga_id 
AND s.korisnik_id = 8
ORDER BY a.datum_odrzavanja, a.vrijeme_odrzavanja

#detalji aktivnost_id 1 
SELECT datum_kreiranja, vrijeme_kreiranja, datum_odrzavanja, vrijeme_odrzavanja, naziv, opis FROM aktivnost
WHERE aktivnost_id = 1

#ime i prezime korisnika za aktivnost_id 1 
SELECT k.ime, k.prezime FROM korisnik k,  sudionik s
WHERE k.korisnik_id = s.korisnik_id AND s.aktivnost_id = 1
