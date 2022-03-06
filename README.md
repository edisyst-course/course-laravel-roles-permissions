# Corso: Practical Roles and Permissions in Laravel
https://laraveldaily.teachable.com/courses/848410/lectures/15392024

    composer require laraveldaily/larastarters --dev
    php artisan larastarters:install
    npm install && npm run dev

Ho selezionato Laravel UI + Tabler (provato nel SAMPLE dei File Uploads)

### Metodi di protezinoe
- Auth middleware per le rotte
- colonna **user_id** per mostrare solo gli articoli del mio user
- AuthorizedScope: lo aggiungo ai model dove voglio che sia usato
- IsAdminMiddleware: lo aggiungo al kernel dei middleware
    - faccio dei controlli su auth()->user()->is_admin

### Many Users in Many Organizations
Sono al video 9 - minuto 7:30 (stò per fare i roles)



