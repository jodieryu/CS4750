USE db;

DELETE FROM restaurant;
ALTER TABLE restaurant AUTO_INCREMENT=1;
INSERT INTO restaurant (rname, phone_num, street, price_range, rating_google) VALUES
("Roots Natural Kitchen", 4345296229, "1329 W Main St", "$", 4.8),
("Cafe 88", 4342939888, "923 Preston Ave", "$", 4.1),
("Got Dumplings", 4342443040, "1395 W Main St", "$", 4.4),
("Cookout", 8665470011, "1254 Emmet St N", "$", 4.1),
("Monsoon Siam", 4349711515, "113 E Market St", "$$", 4.3);

DELETE FROM r_hours;
INSERT INTO r_hours VALUES
(1, "11:00","09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "11:30", "09:00", "all day"), 
(3, "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "11:00", "11:00", "11:00", "11:00", "10:00", "all day");

DELETE FROM customer; 
ALTER TABLE customer AUTO_INCREMENT=1;
INSERT INTO customer (fname, lname, street, city, state, username, pwd) VALUES
("Youbeen", "Shim", "2038 Chase Avenue", "Charlottesville", "VA", "youbeen123", "pass"),
("Joshua", "Ya", "121 Harmon Street", "Charlottesville", "VA", "joshy29", "pass");

DELETE FROM menu; 
ALTER TABLE customer AUTO_INCREMENT=1;
INSERT INTO menu (food_name, price, category, description) VALUES ("El Jefe", 9.00, "main", "Primary Base: Brown Rice Secondary Base: Kale Ingredients: Black Beans, Charred Corn, Red Onions, Avocado, Pita Chips, Feta Dressing: Cilantro Lime From the Grill: Chicken Ask for the Works! (Fresh Lime & Dash of Tabasco)"), 
("Roots Bowl", 7.65, "main", "Primary Base: Roots Rice Secondary Base: Spinach Ingredients: Roasted Sweet Potatoes x2, Red Onions, Pita Chips, Goat Cheese, Dried Cranberries Dressing: Lemon Tahini Ask for it with a splash of Red Wine Vinegar!"),
("The Apollo", 8.00, "main", "Primary Base: Brown Rice Secondary Base: Spinach Ingredients: Chickpeas, Cucumbers, Grape Tomatoes, Red Onions, Pita Chips, Feta Dressing: Lemon Za'atar From the Grill: Chicken"),
("The Southern", 8.00, "main", "Primary Base: Roots Rice Secondary Base: Kale Ingredients: Chickpeas, Roasted Broccoli, Charred Corn, Lime-Pickled Onions, Cheddar Dressing: Lemon Tahini From the Grill: BBQ Tofu"),
("The Apollo", 8.00, "main", "Primary Base: Brown Rice Secondary Base: Spinach Ingredients: Chickpeas, Cucumbers, Grape Tomatoes, Red Onions, Pita Chips, Feta Dressing: Lemon Za'atar From the Grill: Chicken"),
("Mad Bowl", 8.00, "main", "Primary Base: Brown Rice Secondary Base: Spinach Ingredients: Cannellini Beans, Roasted Broccoli, Red Onions, Grape Tomatoes, Cucumbers, Shaved Parmesan Dressing: Basil Balsamic & Pesto Vinaigrette From the Grill: Mushroom"),
("Mayweather", 8.00, "main", "Primary Base: Kale Secondary Base: Bulgur Ingredients: Roasted Sweet Potatoes, Roasted Beets, Red Onions, Goat Cheese, Avocado Dressing: Lemon Tahini & Pesto Vinaigrette From the Grill: Chicken"),
("Pesto Caesar", 7.80, "main", "Primary Base: Kale Secondary Base: Bulgur Ingredients: Grape Tomatoes, Pita Chips, Lime-Pickled Onions, Shaved Parmesan Dressings: Pesto Vinaigrette & Caesar From the Grill: Chicken Ask for it with Sriracha!"),
("Corner Cobb", 8.75, "main", "Primary Base: Arcadian Mix Secondary Base: Kale & Roots Rice Ingredients: Roasted Sweet Potatoes, Charred Corn, Red Onions, Cucumbers, Avocado, Hard Boiled Egg Dressing: Greek Feta From the Grill: Chicken"),
("Tamari", 8.50, "main", "Primary Base: Arcadian Mix Ingredients: Roasted Broccoli, Cucumbers, Lime-Pickled Onions, Avocado, Carrots, Mandarin Orange, Toasted Almonds Dressing: Carrot Ginger From the Grill: Miso Tofu");

