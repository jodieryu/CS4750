DELETE FROM restaurant;
ALTER TABLE restaurant AUTO_INCREMENT=1;
INSERT INTO restaurant (rname, phone_num, street, price_range, rating_google) VALUES
("Roots Natural Kitchen", 4345296229, "1329 W Main St", "$", 4.8),
("Cafe 88", 4342939888, "923 Preston Ave", "$", 4.1),
("Got Dumplings", 4342443040, "1395 W Main St", "$", 4.4),
("Cookout", 8665470011, "1254 Emmet St N", "$", 4.1),
("Monsoon Siam", 4349711515, "113 E Market St", "$$", 4.3),
("Marco & Luca", 4342440016, "107 Elliewood Ave", "$", 4.6),
("Silk Thai", 4349778424, "2210 Fontaine Ave", "$$", 4.8),
("Bodo’s Bagels", 4342936021, "1609 University Ave", "$", 4.7),
("Milan Indian Cuisine", 4349842828, "1817 Emmet St N", "$$", 4.4),
("White Spot", 4349842828, "1407 University Ave", "$", 4.2),
("Trinity Irish Pub", 4342957100, "1505 University Ave", "$$", 3.8),
("Mellow Mushroom", 4349729366, "1321 W Main St", "$$", 3.8), 
("Chopt Creative Salad Co.", 4343288092, "1114 Emmet St", "$$", 3.5),
("Lampo", 4342443226, "205 Monticello Rd", "$$", 4.7),
("Citizen Burger Bar", 4349799944, "212 E Main St", "$$", 4.4),
("Revolutionary Soup", 4342967687, "108 2nd St SW", "$", 4.3),
("Peter Chang", 4342449818, "2162 Barracks Rd", "$$", 4.0),
("Iron Paffles & Coffee", 4348063800, "214 W Water St", "$", 4.3)
;

DELETE FROM r_hours;
INSERT INTO r_hours VALUES
(1, "11:00","09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "10:30", "09:00", "11:30", "09:00", "all day"), 
(2, "","", "11:00", "08:00", "11:00", "08:00", "11:00", "08:00", "11:00", "08:00", "11:00", "08:00", "11:00", "08:00", "all day"),
(3, "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "10:00", "11:00", "11:00", "11:00", "11:00", "all day"),
(4, "10:30","03:30", "10:30", "03:30", "10:30", "03:30", "10:30", "03:30", "10:30", "03:30", "10:30", "04:30", "10:30", "04:30", "all day");

DELETE FROM customer; 
ALTER TABLE customer AUTO_INCREMENT=1;
INSERT INTO customer (fname, lname, street, city, state, username, pwd) VALUES
("Youbeen", "Shim", "2038 Chase Avenue", "Charlottesville", "VA", "youbeen123", "$2y$10$o9INWfD8KsxPTRSh0CzojeI/N9deE/n2tBS14EMWAw/I9IwJRUlLW"), #password = password
("Joshua", "Ya", "121 Harmon Street", "Charlottesville", "VA", "joshy29", "$2y$10$D5oXEtJVptQVRTZ2zz02A.V8kcYgiA9fB.TvsX3O6vNycqKe4Pgoa"); #password is pass123

DELETE FROM menu; 
INSERT INTO menu (r_id, food_name, price, category, description) VALUES (1, "El Jefe", 9.00, "main", "Primary Base: Brown Rice Secondary Base: Kale Ingredients: Black Beans, Charred Corn, Red Onions, Avocado, Pita Chips, Feta Dressing: Cilantro Lime From the Grill: Chicken Ask for the Works! (Fresh Lime & Dash of Tabasco)"), 
(1, "Roots Bowl", 7.65, "main", "Primary Base: Roots Rice Secondary Base: Spinach Ingredients: Roasted Sweet Potatoes x2, Red Onions, Pita Chips, Goat Cheese, Dried Cranberries Dressing: Lemon Tahini Ask for it with a splash of Red Wine Vinegar!"),
(1, "The Apollo", 8.00, "main", "Primary Base: Brown Rice Secondary Base: Spinach Ingredients: Chickpeas, Cucumbers, Grape Tomatoes, Red Onions, Pita Chips, Feta Dressing: Lemon Za'atar From the Grill: Chicken"),
(1, "The Southern", 8.00, "main", "Primary Base: Roots Rice Secondary Base: Kale Ingredients: Chickpeas, Roasted Broccoli, Charred Corn, Lime-Pickled Onions, Cheddar Dressing: Lemon Tahini From the Grill: BBQ Tofu"),
(1, "Mad Bowl", 8.00, "main", "Primary Base: Brown Rice Secondary Base: Spinach Ingredients: Cannellini Beans, Roasted Broccoli, Red Onions, Grape Tomatoes, Cucumbers, Shaved Parmesan Dressing: Basil Balsamic & Pesto Vinaigrette From the Grill: Mushroom"),
(1, "Mayweather", 8.00, "main", "Primary Base: Kale Secondary Base: Bulgur Ingredients: Roasted Sweet Potatoes, Roasted Beets, Red Onions, Goat Cheese, Avocado Dressing: Lemon Tahini & Pesto Vinaigrette From the Grill: Chicken"),
(1, "Pesto Caesar", 7.80, "main", "Primary Base: Kale Secondary Base: Bulgur Ingredients: Grape Tomatoes, Pita Chips, Lime-Pickled Onions, Shaved Parmesan Dressings: Pesto Vinaigrette & Caesar From the Grill: Chicken Ask for it with Sriracha!"),
(1, "Corner Cobb", 8.75, "main", "Primary Base: Arcadian Mix Secondary Base: Kale & Roots Rice Ingredients: Roasted Sweet Potatoes, Charred Corn, Red Onions, Cucumbers, Avocado, Hard Boiled Egg Dressing: Greek Feta From the Grill: Chicken"),
(1, "Tamari", 8.50, "main", "Primary Base: Arcadian Mix Ingredients: Roasted Broccoli, Cucumbers, Lime-Pickled Onions, Avocado, Carrots, Mandarin Orange, Toasted Almonds Dressing: Carrot Ginger From the Grill: Miso Tofu"),
(2, "Egg Drop Soup", 2.00, "soup", ""),
(2, "Wonton Soup", 2.00, "soup", ""),
(2, "Hot & Sour Soup", 2.00, "soup", ""),
(2, "Mushroom Soup", 2.00, "soup", ""),
(2, "Miso Soup", 2.00, "soup", ""),
(2, "Crispy Chicken", 4.88, "appetizer", "Chunks of chicken w/spiced salt & basil"),
(2, "Crispy Tofu", 4.88, "appetizer", "Crispy fried tofu w/ spiced salt & basil. vegetarian available"),
(2, "Ten-bu-la", 4.88, "appetizer", "Fish cake tempura w/ sweet red chili sauce"),
(2, "Crystal Steam Shrimp Dumpling", 4.88, "appetizer", ""),
(2, "Seafood Shao Mai", 4.88, "appetizer", ""),
(2, "Shrimp w/ Chinese Chives Dumpling", 4.88, "appetizer", ""),
(2, "Heavenly Pie", 4.88, "appetizer", "Fried homemade pie w/ chinese chives. vegetarian available"),
(2, "Minced Fish Bean Curd Sheet Roll", 4.88, "appetizer", ""),
(2, "Scallion Pancake", 2.88, "appetizer", "Eggs +$0.75. vegetarian available"),
(2, "Spring Roll", 1.28, "appetizer", "No eggs. vegetarian available"),
(2, "Wonderful Chicken", 7.88, "main", "Tender chicken breast w/ tasty special sauce"),
(2, "Pork Chop", 7.88, "main", "Taiwanese style pork chop"),
(2, "Amazing Chicken", 7.88, "main", "Dark meat chicken w/ spiced amazing sauce"),
(2, "Fish Filet on Rice", 9.88, "main", ""),
(2, "Japanese Omelet", 7.88, "main", "Omelet w/ ketchup fried rice. vegetarian available"),
(2, "Pineapple Fried Rice", 7.88, "main", "Vegetarian available"),
(2, "Crispy Tofu", 7.88, "main", "Fried tofu w/ salt & pepper. vegetarian available"),
(2, "Vegetarian Chicken Filet", 7.88, "main", "Vegetarian available"),
(2, "Vegetarian Protein Special", 7.88, "main", "Bean curd sheets or gluten. vegetarian available"),
(3, "Dumplings w/ One Side", 6.50, "main", "Add 2 Extra Dumplings for 1.00"),
(3, "Dumplings w/ Two Sides", 7.95, "main", "Add 2 Extra Dumplings for 1.00"),
(3, "Dumplings", 4.50, "main", "Original Pork, Curry Chicken, Shrimp and Chive, or Tofu"),
(3, "Side Dishes", 2.75, "main", "Cold Peanut Flavored Noodles, Seaweed Salad, Kimchi, Asian Salad, Egg, Fried Rice, Edamame, or Shrimp Chips"),
(3, "Pork, Egg, Bok Choy, Green Onion in Pork Stock Ramen", 7.95, "main", "Add Kimchi or Dumplings for 1.00"),
(3, "Soy Ramen or Udon", 7.95, "main", "Add Kimchi or Dumplings for 1.00"),
(3, "Miso Ramen or Udon", 7.95, "main", "Add Kimchi or Dumplings for 1.00"),
(3, "Pork, Chicken or Tofu Dumpling in Pork Stock & Bok Choy", 7.95, "main", ""),
(12, "Pretzel Bites", 7.50, "munchies", "Signature Mellow dough, cut into bite-sized pieces, finished with garlic butter and parmesan. Served with a side of our Pabst Blue Ribbon™ beer cheese dip, it's the perfect shareable munchie"), 
(12, "Bruschetta", 7.50, "munchies", "Diced tomatoes, basil and seasonings tossed in balsamic vinegar and olive oil. Topped with feta cheese and fresh basil, served on garlic toast points, and drizzled with a balsamic glaze"),
(12, "Garlic Cheese Bread", 4.75, "munchies", "French bread topped with melted mozzarella, then baked. Served with a side of Mellow red sauce; Add Fresh Tomatoes for an Additional $0.5"), 
(12, "Pretzels (half)", 4.75, "munchies", "Signature Mellow dough twisted into pretzels: Choice of garlic butter and parmesan with a side of Mellow red sauce or garlic butter and kosher salt with a side of mustard"),
(12, "Pretzels (whole)", 8.25, "munchies", "Whole; Signature Mellow dough twisted into pretzels: Choice of garlic butter and parmesan with a side of Mellow red sauce or garlic butter and kosher salt with a side of mustard"),
(12, "Meatball Trio", 7.50, "munchies", "Three meatballs grilled with fresh mozzarella on a bed of Mellow red sauce with shaved parmesan and basil, sprinkled with breadcrumbs"),
(12, "Hummus", 7.00, "munchies", "Creamy hummus served with your choice of toasted pita wedges or carrots and celery. Garnished with paprika, basil and olive oil"),
(12, "Oven Roasted Wings (Half (5))", 5.25, "munchies", "Crisp double-baked wings. Choose from hot, mild, BBQ, jerk, sweet Thai chili or naked. Served with celery, carrots and your choice of ranch or bleu cheese dressing"),
(12, "Oven Roasted Wings (Whole (10))", 9.25, "munchies", "Crisp double-baked wings. Choose from hot, mild, BBQ, jerk, sweet Thai chili or naked. Served with celery, carrots and your choice of ranch or bleu cheese dressing"),
(12, "Soup Of The Day", 5.75, "munchies", "Ask your server for details"),
(12, "Greek Salad", 9.00, "salad", "Romaine and iceberg lettuce, shredded carrots, red cabbage, onions, cucumbers, green peppers, mushrooms, feta cheese, kalamata olives, roma tomatoes, pepperoncini and banana peppers"),
(12, "Caesar Salad", 8.00, "salad", "Romaine lettuce tossed with Caesar dressing and topped with shaved parmesan and house-made croutons. Add all-natural chicken or applewood smoked bacon for an additional charge"),
(12, "Enlightened Spinach Salad", 9.75, "salad", "Fresh spinach topped with dried cherries, apples, house-made candied pecans and feta cheese. Add all-natural chicken or applewood smoked bacon for an additional charge"),
(12, "House Salad", 7.00, "salad", "Spring mix and romaine with roma tomatoes, cucumbers, black olives and onions topped with shaved parmesan. We suggest balsamic vinaigrette with this salad"),
(12, "Chef Salad", 9.25, "salad", "Romaine and iceberg lettuce, shredded carrots, red cabbage, onions, cucumbers, green peppers, mushrooms, black olives, roma tomatoes, mozzarella, provolone and ham")
;

DELETE FROM r_category; 
INSERT INTO r_category (r_id, category) VALUES (1, "Salad"), (2, "Chinese"), (3, "Chinese"), 
(4, "Fast-food"), (5, "Thai"), (6, "Chinese"), 
(7, "Thai"),  (8, "Sandwiches"),  (8, "Breakfast"),  
(9, "Indian"),  (10, "American"), (11, "American"),  
(11, "Bar"),  (12, "Pizza"),  (13, "Salad"), 
(14, "Pizza"), (14, "Italian"), (15, "American"), 
(16, "American"), (17, "Chinese"), (18, "Sandwiches"), 
(18, "American");

DELETE FROM supplier;
ALTER TABLE supplier AUTO_INCREMENT=1;
INSERT INTO supplier (sname, street, city, state) VALUES 
("Wolf Creek Farm", "4345 Wolftown-Hood Road", "Madison", "VA")
;

DELETE FROM provide;
INSERT INTO provide VALUES 
(14, 1, "beef")
; 
