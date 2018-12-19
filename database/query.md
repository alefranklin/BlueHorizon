-- aggiungere travel
INSERT INTO travels (description, departure, arrival) VALUES ($travel_desc, $departure_planet, $arrival_planet);

-- modificare travel
UPDATE travels SET description = $travel_desc, departure = $departure_planet, arrival = $arrival_planet WHERE id = $id_travel;

-- eliminare travel
DELETE FROM travels WHERE id = $travel_id;



-- aggiungere pianeta
INSERT INTO planets (name, info, mass, temperature) VALUES ($name_planet, $planet_info, $mass, $temperature);

-- modificare pianeta
UPDATE planets SET name = $name_planet, info = $planet_info, mass = $mass, temperature = $temperature WHERE id = $planet_id;

-- eliminare pianeta
DELETE FROM plantes WHERE id = $planet_id;



-- aggiungere user // registration
INSERT INTO users (name, lastname, sex, email, password, username, isAdmin) VALUES ($first_name, $lastname, $sex, $email, $password, $username, $isAdmin);

-- modificare user
  -- modifca password
  UPDATE users SET password = $password WHERE id = $user_id;

  -- modifica email
  UPDATE users SET email = $email;

-- eliminare user
DELETE FROM users WHERE id = $user_id;


-- aggiungere rocket
INSERT INTO rocekts (model, weight, height, nationality) VALUES ($r_model, $r_weight, $r_height, $r_nationality);

-- modificare rocket
UPDATE rockets SET model = $ r_model, weight = $r_weight, height = $r_height, nationality = $r_nationality WHERE id = $r_id;

-- eliminare rocket
DELETE FROM rockets WHERE id = $r_id;


-- cabin

-- rocket_cabin

-- images

-- aggiungere ordine
INSERT INTO orders (id_user, id_travel, id_rc, )
-- modificare ordine
-- eliminare ordine
