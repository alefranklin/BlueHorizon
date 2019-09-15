-- travels

  -- list

  -- add
  INSERT INTO travels (id, id_rocket, id_planet, departure_date, duration) VALUES ($id_travel,$id_rocket,$id_planet,$departure_date,$duration_time);

  -- update
  UPDATE travels SET id_rocket = $id_rocket, id_planet = $id_planet, departure_date = $departure_date, duration = $duration_time WHERE id = $id_travel;

  -- delete
  DELETE FROM travels WHERE id = $travel_id;


-- planets

  -- list

  -- add
  INSERT INTO planets (id, name, info, mass, temperature) VALUES ($planet_id, $name_planet, $planet_info, $mass, $temperature);

  -- update
  UPDATE planets SET name = $name_planet, info = $planet_info, mass = $mass, temperature = $temperature WHERE id = $planet_id;

  -- delete
  DELETE FROM plantes WHERE id = $planet_id;


-- users

  -- list

  -- add user // registration
  INSERT INTO users (id, username, name, lastname, sex, email, pwhash, isAdmin) VALUES ($user_id, $username, $name, $lastname, $sex, $email, $pwhash, $isAdmin);

  -- update
    -- password
    UPDATE users SET pwhash = $pwhash WHERE id = $user_id;

    -- email
    UPDATE users SET email = $email WHERE id = $user_id;

  -- delete
  DELETE FROM users WHERE id = $user_id;


-- rocekts

  -- list

  -- add
    INSERT INTO rocekts (id, name, weight, height, nationality, length) VALUES ($rocket_id, $r_name, $r_weight, $r_height, $r_nationality, $r_length);

  -- update
  UPDATE rockets SET name = $r_name, weight = $r_weight, height = $r_height, nationality = $r_nationality, length = $r_length WHERE id = $rocket_id;

  -- delete
  DELETE FROM rockets WHERE id = $rocket_id;


-- cabin

  -- list

  -- add
  INSERT INTO cabins (id, class, adult_price, kid_price) VALUES ($cabin_id, $class, $a_price, $k_price);

  -- update
  UPDATE cabins SET class = $class, adult_price = $a_price, kid_price = $k_price WHERE id = $cabin_id;

  -- delete
  DELETE FROM cabins WHERE id = $cabin_id;

-- rocket_cabin

  -- list

  -- add
  INSERT INTO rocket_cabin (id_cabin, id_rocket, number) VALUES ($cabin_id, $rocket_id, $cabinNumber);

  -- update
  UPDATE rocket_cabin SET number = $cabinNumber WHERE id_cabin = $cabin_id, id_rocket = $rocket_id;

  -- delete
  DELETE FROM rocket_cabin WHERE id_cabin = $cabin_id, id_rocket = $rocket_id;

//////////////////////****************************
-- rocket_travel

  -- list

  -- add
  INSERT INTO rocket_travel (id_travel, id_rocket, date) VALUES ($travel_id, $rocket_id, $launch_date);

  -- update
  UPDATE rocket_travel SET id_travel = $travel_id, id_rocket = $rocket_id, date = $launch_date;

  -- delete
                                //cancella per id  //cancella per travel       //cancella per razzo        //cancella per data
  DELETE FROM rocket_travel WHERE (id = $rc_id) OR (id_travel = $travel_id) OR (id_rocket = $rocket_id) OR (date = $launch_date)

-- images

  -- list

  -- add
  INSERT INTO images (path, name) VALUES ($img_path, $img_name);

  -- update
  UPDATE images SET path = $img_path, name = $img_name;

  -- delete
  DELETE FROM images WHERE id = $img_id;

  -- img_planet

    -- list

    -- add
    INSERT INTO img_planet (id_planet, id_img) VALUES ($planet_id, $img_id);

    -- update
    NONE

    -- delete
    NONE

  -- img_travel

    -- list

    -- add
    INSERT INTO img_travel (id_travel, id_img) VALUES ($travel_id, $img_id);

    -- update
    NONE

    -- delete
    NONE
**************************************////////////////////////////////////
-- orders

  -- list

  -- add
  INSERT INTO orders (id, id_user, id_travel, id_cabin, adults_number, kids_number) VALUES ($order_id, $user_id, $travel_id, $cabin_id, $adults_number, $kids_number);

  -- update
  UPDATE orders SET id_user = $user_id, id_travel = $travel_id, id_cabin = $cabin_id, adults_number = $adults_number, kids_number = $kids_number WHERE id = $order_id;

  -- delete
  DELETE FROM orders WHERE id = $order_id;
