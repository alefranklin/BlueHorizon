-- travels
  -- add
  INSERT INTO travels (description, departure, arrival) VALUES ($travel_desc, $departure_planet, $arrival_planet);

  -- update
  UPDATE travels SET description = $travel_desc, departure = $departure_planet, arrival = $arrival_planet WHERE id = $id_travel;

  -- delete
  DELETE FROM travels WHERE id = $travel_id;


-- planets
  -- add
  INSERT INTO planets (name, info, mass, temperature) VALUES ($name_planet, $planet_info, $mass, $temperature);

  -- update
  UPDATE planets SET name = $name_planet, info = $planet_info, mass = $mass, temperature = $temperature WHERE id = $planet_id;

  -- delete
  DELETE FROM plantes WHERE id = $planet_id;


-- users
  -- add user // registration
  INSERT INTO users (name, lastname, sex, email, password, username, isAdmin) VALUES ($first_name, $lastname, $sex, $email, $password, $username, $isAdmin);

  -- update
    -- password
    UPDATE users SET password = $password WHERE id = $user_id;

    -- email
    UPDATE users SET email = $email;

  -- delete
  DELETE FROM users WHERE id = $user_id;


-- rocekts
  -- add
    INSERT INTO rocekts (model, weight, height, nationality) VALUES ($r_model, $r_weight, $r_height, $r_nationality);

  -- update
  UPDATE rockets SET model = $r_model, weight = $r_weight, height = $r_height, nationality = $r_nationality WHERE id = $rocket_id;

  -- delete
  DELETE FROM rockets WHERE id = $rocket_id;


-- cabin  
  -- add
  INSERT INTO cabin (seats, class) VALUES ($seats, $class);

  -- update
  UPDATE cabin SET seats = $seats, class = $class;

  -- delete
  DELETE FROM cabin WHERE id = $cabin_id;

-- rocket_cabin
  -- add
  INSERT INTO rocket_cabin (id_rocket, id_cabin, number_of_cabin, price, free) VALUES ($rocket_id, $cabin_id, $cabinNumber, $cabin_price, $free);

  -- update
  UPDATE rocket_cabin SET id_rocket = $rocket_id, id_cabin = $cabin_id, number_of_cabin = $cabinNumber, price = $cabin_price, free = $free);

  -- delete
  DELETE FROM rocket_cabin WHERE id = $rc_id;

-- rocket_travel
  -- add
  INSERT INTO rocket_travel (id_travel, id_rocket, date) VALUES ($travel_id, $rocket_id, $launch_date);

  -- update
  UPDATE rocket_travel SET id_travel = $travel_id, id_rocket = $rocket_id, date = $launch_date;

  -- delete
                                //cancella per id  //cancella per travel       //cancella per razzo        //cancella per data
  DELETE FROM rocket_travel WHERE (id = $rc_id) OR (id_travel = $travel_id) OR (id_rocket = $rocket_id) OR (date = $launch_date)

-- images
  -- add
  INSERT INTO images (path, name) VALUES ($img_path, $img_name);

  -- update
  UPDATE images SET path = $img_path, name = $img_name;

  -- delete
  DELETE FROM images WHERE id = $img_id;

  -- img_planet
    -- add
    INSERT INTO img_planet (id_planet, id_img) VALUES ($planet_id, $img_id);

    -- update
    NONE

    -- delete
    NONE

  -- img_travel
    -- add
    INSERT INTO img_travel (id_travel, id_img) VALUES ($travel_id, $img_id);

    -- update
    NONE

    -- delete
    NONE

-- orders
  -- add
  INSERT INTO orders (id_user, id_travel, id_rc, number_of_seat) VALUES ($user_id, $travel_id, $rc_id, $number_of_seat);

  -- update
  UPDATE orders SET id_user = $user_id, id_travel = $travel_id, id_rc = $rc_id, number_of_seat = $number_of_seat;

  -- delete
  DELETE FROM orders WHERE id = $order_id;
