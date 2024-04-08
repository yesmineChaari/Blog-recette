-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 12:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Vegetarian'),
(2, 'Gluten-Free'),
(3, 'Main Dish'),
(4, 'Desert'),
(5, 'Breakfast'),
(6, 'Vegan'),
(7, 'Salad'),
(8, 'Sweet');

-- --------------------------------------------------------

--
-- Table structure for table `has_category`
--

CREATE TABLE `has_category` (
  `recipe` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `has_category`
--

INSERT INTO `has_category` (`recipe`, `category`) VALUES
(0, 1),
(0, 2),
(0, 3),
(0, 1),
(0, 2),
(0, 3),
(21, 1),
(21, 2),
(21, 4),
(22, 3),
(22, 4),
(23, 1),
(23, 2),
(23, 3),
(1, 2),
(1, 3),
(3, 1),
(3, 2),
(5, 7),
(6, 1),
(6, 3),
(5, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 5),
(8, 6),
(9, 2),
(9, 3),
(9, 6),
(11, 1),
(11, 3),
(10, 7),
(12, 1),
(12, 3),
(13, 3),
(2, 1),
(2, 2),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `dishName` text NOT NULL,
  `dishDescription` text NOT NULL,
  `ingredients` text NOT NULL,
  `steps` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `dishImage` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `dishName`, `dishDescription`, `ingredients`, `steps`, `date`, `dishImage`) VALUES
(1, 'Spicy Chicken Stir Fry', 'A flavorful and quick stir-fry dish with tender chicken and crunchy vegetables, infused with a spicy sauce.', '1 lb chicken breast, thinly sliced.\r\n2 cups mixed vegetables (bell peppers, broccoli, snap peas).\r\n2 cloves garlic, minced.\r\n1 tablespoon ginger, grated.\r\n2 tablespoons soy sauce.\r\n1 tablespoon sriracha sauce.\r\n1 tablespoon sesame oil.\r\nSalt and pepper to taste', 'Heat sesame oil in a large skillet over medium-high heat.\r\nAdd minced garlic and grated ginger, sauté for 1 minute until fragrant.\r\nAdd sliced chicken breast to the skillet, season with salt and pepper, and cook until browned and cooked through.\r\nStir in mixed vegetables and cook until tender-crisp.\r\nMix soy sauce and sriracha sauce, then pour over the chicken and vegetables. Stir well to combine.\r\nCook for another 2-3 minutes until everything is heated through and coated in the sauce.\r\nServe hot over steamed rice or noodles', '2024-04-01', 'spicy-chicken-stir-fry.jpg'),
(2, ' Caprese Salad', 'A classic Italian salad featuring ripe tomatoes, fresh mozzarella cheese, basil leaves, and a drizzle of balsamic glaze.', '2 large tomatoes, sliced.\r\nfresh mozzarella cheese, sliced.\r\nFresh basil leaves.\r\nBalsamic glaze.\r\nExtra virgin olive oil.\r\nSalt and pepper to taste', 'Arrange tomato slices and mozzarella slices alternately on a serving platter.Tuck fresh basil leaves between the tomato and mozzarella slices.Drizzle with balsamic glaze and extra virgin olive oil.Season with salt and pepper to taste.Serve immediately as an appetizer or side dish', '2024-04-01', 'Caprese-Salad.jpg'),
(5, ' Vegetarian Quinoa Salad', 'A nutritious and colorful salad packed with protein-rich quinoa, mixed vegetables, and a zesty lemon dressing.', '1 cup quinoa, rinsed.\r\n2 cups water or vegetable broth.\r\n1 cup cherry tomatoes, halved.\r\n1 cucumber, diced.\r\n1 bell pepper, diced.\r\n1/4 cup red onion, finely chopped.\r\n1/4 cup fresh parsley, chopped.\r\n1/4 cup feta cheese, crumbled.\r\nJuice of 1 lemon.\r\n2 tablespoons olive oil.\r\nSalt and pepper to taste', 'In a medium saucepan, bring water or vegetable broth to a boil. Add quinoa, reduce heat to low, cover, and simmer for 15-20 minutes until quinoa is cooked and water is absorbed. Let it cool.\r\nIn a large bowl, combine cooked quinoa, cherry tomatoes, cucumber, bell pepper, red onion, and parsley.\r\nIn a small bowl, whisk together lemon juice, olive oil, salt, and pepper to make the dressing.\r\nPour the dressing over the quinoa and vegetables, toss gently to coat.\r\nSprinkle crumbled feta cheese on top.\r\nServe chilled or at room temperature. Enjoy!\r\n\r\n\r\n\r\n\r\n', '2024-04-01', 'vegan-quinoa-salad.jpg'),
(6, ' Creamy Garlic Pasta', 'A rich and indulgent pasta dish featuring creamy garlic sauce and tender spaghetti, topped with fresh parsley.', '8 oz spaghetti.\r\n3 cloves garlic, minced.\r\n2 tablespoons butter.\r\n1 cup heavy cream.\r\n1/2 cup grated Parmesan cheese.\r\nSalt and pepper to taste.\r\nFresh parsley, chopped, for garnish.\r\n', 'Cook spaghetti according to package instructions until al dente. Drain and set aside.\r\nIn a large skillet, melt butter over medium heat. Add minced garlic and sauté until fragrant, about 1 minute.\r\nPour in heavy cream and bring to a simmer. Let it cook for 2-3 minutes until slightly thickened.\r\nStir in grated Parmesan cheese until melted and smooth.\r\nSeason with salt and pepper to taste.\r\nAdd cooked spaghetti to the skillet and toss until well coated in the creamy garlic sauce.\r\nServe hot, garnished with chopped fresh parsley', '2024-04-01', 'creamy-garlic-pasta.jpg'),
(7, 'Baked Honey Mustard Salmon', 'Succulent salmon fillets baked to perfection with a sweet and tangy honey mustard glaze.', '4 salmon fillets.\r\n1/4 cup Dijon mustard.\r\n2 tablespoons honey.\r\n1 tablespoon soy sauce.\r\n2 cloves garlic, minced.\r\n1 tablespoon olive oil.\r\nSalt and pepper to taste.\r\nFresh lemon wedges, for serving.', 'Preheat the oven to 375°F (190°C). Line a baking sheet with parchment paper or foil.\r\nIn a small bowl, whisk together Dijon mustard, honey, soy sauce, minced garlic, olive oil, salt, and pepper to make the glaze.\r\nPlace salmon fillets on the prepared baking sheet. Brush the tops of the fillets with the honey mustard glaze.\r\nBake in the preheated oven for 12-15 minutes, or until the salmon is cooked through and flakes easily with a fork.\r\nRemove from the oven and let it rest for a few minutes.\r\nServe hot with fresh lemon wedges on the side', '2024-04-01', 'baked-honey-mustard-salmon.jpg'),
(8, 'Berry Smoothie Bowl', 'A refreshing and nutritious smoothie bowl packed with mixed berries, banana, and topped with granola and coconut flakes.', '1 cup mixed berries (strawberries, blueberries, raspberries).\r\n1 ripe banana.\r\n1/2 cup Greek yogurt.\r\n1/4 cup almond milk.\r\n1 tablespoon honey (optional).\r\nGranola.\r\nCoconut flakes.\r\nFresh berries for garnish', 'In a blender, combine mixed berries, banana, Greek yogurt, almond milk, and honey (if using). Blend until smooth and creamy.\r\nPour the smoothie into a bowl.\r\nTop with granola, coconut flakes, and fresh berries.\r\nEnjoy immediately with a spoon', '2024-04-01', 'berry-smoothie-bowl.jpeg'),
(9, 'Teriyaki Tofu Stir Fry', ' A satisfying and flavorful stir-fry dish featuring crispy tofu cubes, colorful vegetables, and a homemade teriyaki sauce.', '1 block firm tofu, pressed and cubed.\r\n2 tablespoons soy sauce.\r\n2 tablespoons honey.\r\n1 tablespoon rice vinegar.\r\n1 clove garlic, minced.\r\n1 teaspoon ginger, grated.\r\n2 tablespoons vegetable oil.\r\n2 cups mixed vegetables (bell peppers, broccoli, carrots).\r\nCooked rice, for serving.\r\nSesame seeds, for garnish.\r\nGreen onions, chopped, for garnish', 'In a small bowl, mix soy sauce, honey, rice vinegar, minced garlic, and grated ginger to make the teriyaki sauce.\r\nHeat vegetable oil in a large skillet over medium-high heat. Add cubed tofu and cook until golden and crispy on all sides. Remove tofu from the skillet and set aside.\r\nIn the same skillet, add mixed vegetables and stir-fry until tender-crisp.\r\nReturn the crispy tofu to the skillet and pour the teriyaki sauce over the tofu and vegetables. Stir well to coat everything evenly.\r\nCook for another 2-3 minutes until the sauce thickens slightly and everything is heated through.\r\nServe hot over cooked rice, garnished with sesame seeds and chopped green onions', '2024-04-01', 'teriyaki-tofu-stir-fry.jpg'),
(10, 'Mediterranean Chickpea Salad', 'A vibrant and hearty salad filled with chickpeas, cherry tomatoes, cucumber, olives, and feta cheese, tossed in a lemon herb dressing.', '2 cups cooked chickpeas (canned or cooked from dry).\r\n1 cup cherry tomatoes, halved.\r\n1 cucumber, diced.\r\n1/4 cup Kalamata olives, pitted and sliced.\r\n1/4 cup crumbled feta cheese.\r\n2 tablespoons fresh parsley, chopped.\r\nJuice of 1 lemon.\r\n2 tablespoons extra virgin olive oil.\r\n1 teaspoon dried oregano.\r\nSalt and pepper to taste', 'In a large bowl, combine cooked chickpeas, cherry tomatoes, cucumber, olives, crumbled feta cheese, and chopped parsley.\r\nIn a small bowl, whisk together lemon juice, olive oil, dried oregano, salt, and pepper to make the dressing.\r\nPour the dressing over the chickpea salad and toss gently to coat.\r\nTaste and adjust seasoning if needed.\r\nServe chilled or at room temperature as a main dish or side salad', '2024-04-01', 'mediterranean-chickpea-salad.jpg'),
(11, 'Classic Margherita Pizza', 'A simple yet delicious pizza topped with fresh tomatoes, mozzarella cheese, basil leaves, and a drizzle of olive oil.', '1 pre-made pizza dough.\r\n1/2 cup pizza sauce.\r\n1 large tomato, thinly sliced.\r\n8 oz fresh mozzarella cheese, sliced.\r\nFresh basil leaves.\r\nOlive oil.\r\nSalt and pepper to taste', 'Preheat the oven to the temperature specified on the pizza dough package.\r\nRoll out the pizza dough on a lightly floured surface into your desired shape.\r\nTransfer the dough to a pizza stone or baking sheet lined with parchment paper.\r\nSpread pizza sauce evenly over the dough, leaving a small border around the edges.\r\nArrange tomato slices and mozzarella slices alternately on top of the sauce.\r\nTear fresh basil leaves and scatter them over the pizza.\r\nDrizzle olive oil over the pizza and season with salt and pepper.\r\nBake in the preheated oven according to the pizza dough package instructions, or until the crust is golden brown and the cheese is melted and bubbly.\r\nRemove from the oven, slice, and serve hot. Enjoy!', '2024-04-01', 'classic-margherita-pizza.jpeg'),
(12, 'Black Bean and Corn Quesadillas', 'A delicious and satisfying Mexican-inspired dish featuring cheesy quesadillas filled with black beans, corn, bell peppers, and spices.', '1 cup canned black beans, rinsed and drained.\r\n1 cup frozen corn kernels, thawed.\r\n1 bell pepper, diced.\r\n1 cup shredded Mexican blend cheese.\r\n1 teaspoon ground cumin.\r\n1/2 teaspoon chili powder.\r\nSalt and pepper to taste.\r\nCooking spray or vegetable oil.\r\nSour cream, salsa, and guacamole, for serving', 'In a large mixing bowl, combine black beans, corn, diced bell pepper, shredded cheese, ground cumin, chili powder, salt, and pepper. Mix well to combine.\r\nLay out the flour tortillas on a clean surface. Divide the bean and corn mixture evenly among the tortillas, spreading it over half of each tortilla.\r\nFold the tortillas in half to cover the filling, pressing gently to seal.\r\nHeat a large skillet or griddle over medium heat. Spray with cooking spray or brush with a little vegetable oil.\r\nPlace the filled tortillas on the skillet and cook for 2-3 minutes on each side, or until golden brown and crispy, and the cheese is melted.\r\nRemove from the skillet and let them cool for a minute before slicing into wedges.\r\nServe hot with sour cream, salsa, and guacamole on the side for dipping.\r\nEnjoy these tasty quesadillas as a snack, appetizer, or light meal!', '2024-04-01', 'black-bean-and-corn-quesadillas.jpg'),
(13, 'Lemon Garlic Shrimp Pasta', 'A light and flavorful pasta dish featuring succulent shrimp cooked in a lemon garlic sauce, served over tender spaghetti.', '8 oz spaghetti.\r\n1 lb large shrimp, peeled and deveined.\r\n4 cloves garlic, minced.\r\nZest of 1 lemon.\r\nJuice of 1 lemon.\r\n3 tablespoons butter.\r\n2 tablespoons olive oil.\r\n1/4 cup fresh parsley, chopped.\r\nSalt and pepper to taste.\r\nGrated Parmesan cheese for serving', 'Cook spaghetti according to package instructions until al dente. Drain and set aside.\r\nSeason shrimp with salt, pepper, and lemon zest.\r\nIn a large skillet, heat olive oil over medium heat. Add minced garlic and cook until fragrant, about 1 minute.\r\nAdd seasoned shrimp to the skillet and cook until pink and opaque, about 2-3 minutes per side.\r\nRemove cooked shrimp from the skillet and set aside.\r\nIn the same skillet, melt butter over medium heat. Add lemon juice and chopped parsley, stirring to combine.\r\nReturn cooked shrimp to the skillet and toss to coat in the lemon garlic sauce.\r\nAdd cooked spaghetti to the skillet and toss until well coated in the sauce.\r\nSeason with additional salt and pepper if needed.\r\nServe hot, garnished with grated Parmesan cheese.\r\nEnjoy this delightful lemon garlic shrimp pasta as a quick and satisfying meal!', '2024-04-01', 'lemon-garlic-shrimp-pasta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `userEmail` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `userEmail`, `password`, `bio`, `admin`) VALUES
(9, 'admin\'s name', 'admin@gmail.com', '$2y$10$nDxrlekAHgp8A8jjDoGVWeDJWDClWjyxEQbjtkVX22rTBGqXvI3ju', 'i\'m the admin of this website', 1),
(10, 'user 1', 'user1@gmail.com', '$2y$10$nGAxODE/TltDn7g3etkS7./bbwGOudsNAS89t0.kp48e/BehCTSqi', 'i\'m the first user in this website', 0),
(11, 'user 2', 'user2@gmail.com', '$2y$10$bkn9nHCI6UUAurmO6DVgeO0p/3VTmwsWa5l3bQvTe9n6VRu.XUcYi', 'i\'m the second user in this website', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dishName` (`dishName`) USING HASH;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
