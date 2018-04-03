from selenium import webdriver

#registration automation

driver = webdriver.Firefox()
driver.get("http://dev.local/EnvProject/register.php")
driver.find_element_by_name("username").send_keys("osman")
driver.find_element_by_name("email").send_keys("osman@example.com")
driver.find_element_by_name("location").send_keys("isiolo")
driver.find_element_by_name("password").send_keys("1234")
driver.find_element_by_name("password2").send_keys("1234")
driver.find_element_by_name("register_btn").click()

#login automation
driver.get("http://dev.local/EnvProject/login.php")
driver.find_element_by_name("username").send_keys("osman")
driver.find_element_by_name("password").send_keys("1234")
driver.find_element_by_name("login_btn").click()

driver.set_page_load_timeout(30)
driver.close()