# Qualifikationsschritt M2 (CAS MSED HSLU)

Github-Repository mit der Dokumentation und den Codebeispielen für den Qualifikationsschritt im Modul M2 für den CAS MSED (Modern Software Engineering & Development ) and der HSLU - Informatik.

## Kurzbeschreibung

Im Rahmen der Transferarbeit für den CAS MSED haben wir eine für die Planung von Gartenarbeiten und -bepflanzung Webapplikation entwickelt. Ein Problem 

## Dokumentation

Die ausführliche Dokumentation befindet sich im Unterverzeichnis `dokumentation` ([./dokumentation/Qualifikationsschritt_M2.pdf]()).

## Codebeispiele

Alle Codebeispiele sind im Verzeichnis `source` abgelegt zusammen mit einer kurzen Anleitung, wie die Code-Beispiele ausgeführt werden können.

### PHP

1. [PHP installieren](https://www.php.net/manual/en/install.php)
2. Ins Verzeichnis navigieren:
            
        cd source/php

3. Skript ausführen:

        php perm.php MODE SIZE

Beispiel:

    php perm.php R 9
    R: 362880 permutations in 0.107521011 seconds

### Rust

1. [Rust installieren](https://www.rust-lang.org/tools/install)
2. Ins Verzeichnis navigieren:
            
        cd source/rust

3. Code kompilieren:

        rustc -C opt-level=3 perm.rs

4. Progamm ausführen:

        ./perm MODE SIZE

Beispiel:

    ./perm I 11                 
    I: 39916800 permutations in 4.149067326 seconds

### Haskell

# Permutations (Haskell)

1. [Haskell](https://www.haskell.org/downloads/)
2. Ins Verzeichnis navigieren:
            
        cd source/haskell


3. Code kompilieren:

        ghc -o perm perm.hs

4. Progamm ausführen:

       ./perm MODE

Beispiel:

    ./perm 12          
    λ: 479001600 permutations in 8.75207300 seconds

