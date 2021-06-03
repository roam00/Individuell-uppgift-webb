# Individuell uppgift


Uppgiften går ut på att skapa en sida med kommentarsfunktionalitet. Endast inloggade
användare ska kunna posta kommentarer. Således behöver användare kunna registrera sig
och logga in. Användare ska även kunna logga ut. Kommentarer listas med avsändare och
meddelande. Den användare som är inloggad är den som står som avsändare för en kommentar.
Användare måste registreras med e-post och lösenord.


All formulärdata ska (på ett adekvat sätt) valideras på både klient-, och serversidan. Använderes
lösenord får inte sparas som plain-text, utan ska hash:as och saltas. Alla sidor måste vara
skyddade från SQL injections.


Att implementera AJAX (så att inte hela sidan laddar om) är inte ett krav gör att få
godkänt, det är däremot ett krav för att få VG på uppgiften. AJAX är särskilt lämpligt att
använda vid t.ex. publicering av användarnas kommentarer.


Sidan ska se "professionell" ut. Oseriösa eller slarviga inlämningar godtas ej. Det ska alltså
finnas en välgrundad och egenskriven CSS (bootstrap och andra färdiga CSS:er får inte
användas) och inline CSS är inte godkänt.



Krav för Godkänt
• Det ska gå att posta kommentarer
• Endast inloggade användare ska kunna posta kommentarer
• Endast inloggade användare ska kunna se funktioner såsom kommentarsformuläret
{ Du kan välja att tvinga användaren att logga in för att använda sidan
• Användare ska kunna registrera sig med e-post och lösenord
• Två användare ska inte kunna registrera sig med samma e-post
• Användarens lösenord får inte sparas som plain-text utan måste hashas och saltas
{ Du får använda dig utav password hash och password verify
• Det ska gå att logga in och logga ut
• Identifieraren för användaren som är inloggad ska kopplas till nya inlägg som användaren
gör. (Tips: Sessions variabel). Användarens användarnamn ska visas med kommentarerna.
{ Notera att det inte är användarnamnet som skall lagras tillsammans med kommentaren,
utan användarens primärnyckel. Annars så riskerar man att hamna
i en situation där fel namn står på en kommentar (t.ex. om användaren byter
användarnamn).
• All formulärdata ska valideras både på klient- och serversidan. På klientsidan skall
javascript användas för validering.
• All interaktion med databasen skall vara skyddad från SQL injections
• Sidan ska se profesionell ut (genomtänkt och välarbetad). Oseriösa eller slarviga inlämningar
godtas ej
• Det ska finnas en egenskriven CSS som styr designen. Inline CSS är inte tillåtet.



Krav för VG
• Alla krav för godkänt är uppfyllda.
• Implementera AJAX för att undvika att hela sidan laddas om vid varje liten förändring.
(Åtminstone vid publicering av användarnas kommentarer)
Utöver AJAX måste även minst 3 av nedanstående krav uppfyllas för att få VG.
+ Implementera en "profilsida" där användaren kan byta lösenord, användarnamn och
eventuellt ändra annan lagrad information.
+ Användaren ska kunna skapa forumtrådar för att strukturera upp diskussionen.
+ Implementera en sökfunktion som endast visar de inlägg (eller trådar om detta har
implementerats) som innehåller det/de sökord som anges.
+ Implementera funktionalitet för att kunna besvara inlägg. Det ska tydligt framgå att
det nya inlägget är ett svar och till vilket inlägg.
+ Bilder! Tillåt publicering av bilder tillsammans med inlägget. Alternativt, tillåt profilbilder
för användarna som visas tillsammans med inläggen.
