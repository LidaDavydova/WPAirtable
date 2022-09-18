from airtable import Airtable
from woocommerce import API
import time
from json import JSONDecodeError

consumer_key = "ck_f3aad175b9c5c25847fc6ddddfce72ae31c4025b"
consumer_secret = "cs_b2c15fcf55c7b3f98cd9eaef7a482594473e2d97"

BASE_ID = 'appCWIZJ7HUWLXksn'
API_KEY = 'key4tq4XWgkvgIcoY'
TABLE_NAME = 'tblG0bK3AhwBME1Ih'

airtable = Airtable(BASE_ID, TABLE_NAME, API_KEY)


def catalogs(count): 
    try:
        wcapi = API(
                url="https://5.kpipartners.ru",
                consumer_key=consumer_key,
                consumer_secret=consumer_secret,
                timeout=5000,
                wp_api=True,
                version="wc/v3",
                query_string_auth=True
            )
        i = airtable.get_all(view='Grid view')[count]
        country = i['fields']['Страна']
        auto_url = i['fields']['Авто URL']
        model_url = i['fields']['Модель URL']
        categ_url = i['fields']['Категория URL']
        brand_url = i['fields']['Бренд URL']
        img = i['fields']['Фото'][0]['url']
        data_categ = {
              'country': country,
              'auto_url': auto_url,
              'model_url': model_url,
              'categ_url': categ_url,
              'brand_url': brand_url,
          }
        if i['fields'].get('Подходит для #1 URL'):
            url_1 = i['fields']['Подходит для #1 URL']
            data_categ['url_1'] = url_1
        else:
            url_1 = None
        if i['fields'].get('Подходит для #2 URL'):
            url_2 = i['fields']['Подходит для #2 URL']
            data_categ['url_2'] = url_2
        else:
            url_2 = None
        data = {
            "name": country,
            "parent": None,
            "image": {
                "src": img
            },
        } 
        resp = wcapi.post("products/categories", data).json()
        try:
            if resp['data'].get('resource_id'):
                parent = resp['data']['resource_id']
                data_categ['country_id'] = parent
        except KeyError:
            if resp.get('id'):
                parent = resp['id']
                data_categ['country_id'] = parent
        except:
            pass
        categories = [auto_url, model_url, url_1, url_2, categ_url, brand_url]
        names = ['auto_url', 'model_url', 'url_1', 'url_2', 'categ_url', 'brand_url']
        for n in categories:
            if n == None:
                continue
            data = {
            "name": n,
            "parent": parent,
            "image": {
                "src": img
            },
            }
            resp = wcapi.post("products/categories", data).json()
            try:
                if resp['data'].get('resource_id'):
                    parent = resp['data']['resource_id']
                    data_categ[f'{names[categories.index(n)]}_id'] = parent
            except KeyError:
                if resp.get('id'):
                    parent = resp['id']
                    data_categ[f'{names[categories.index(n)]}_id'] = parent
            except:
                pass
        return (parent, data_categ)
    except:
        return (None, data_categ)

table = airtable.get_all(view='Grid view')
for i in range(len(table)):
    while True:
        try:
            wcapi = API(
                    url="https://5.kpipartners.ru",
                    consumer_key=consumer_key,
                    consumer_secret=consumer_secret,
                    timeout=5000,
                    wp_api=True,
                    version="wc/v3",
                    query_string_auth=True
                )
            articul_url = table[i]['fields']['Артикль URL']
            UX = table[i]['fields']['Раздел (для UX)']
            part = table[i]['fields']['Часть комплекта']
            name = table[i]['fields']['Заголовок товара (сумма всех URL)']
            images = [j['url'] for j in table[i]['fields']['Фото']]
            description = table[i]['fields']['Описание товара']
            complectation = table[i]['fields']['В комплекте (для карточки)']
            manufacturer = table[i]['fields']['Manufacturer']
            parametr_1 = table[i]['fields']['Параметр 1']
            parametr_2 = table[i]['fields']['Параметр 2']
            func = catalogs(i)
            categ = func[0]
            data = {
              "name": name,
              "slug": str(articul_url)+'_',
              "images": [{"src": img} for img in images],
              "categories": [{'id': categ}],
              "description" : description,
              }
            if categ != None:
                res_wcapi = wcapi.post("products", data).json()
                print(i, res_wcapi)
                wl = API(
                      url="https://5.kpipartners.ru",
                      consumer_key=consumer_key,
                      consumer_secret=consumer_secret,
                      timeout=2500,
                      wp_api=True,
                      version="wl/v1",
                      query_string_auth=True
                  )
                data_categ = func[1]
                wl.post('post', data_categ).json()
                if UX != "Part of the set" or UX != "Additional +$":
                    data = {
                    'id_product': res_wcapi['id'],
                    'articul_product' : articul_url,
                    'type': UX,
                    'id_complect': res_wcapi['id'],
                    'articul_complect' : part,
                    'complectation': ','.join(complectation),
                    'manufacturer': manufacturer,
                    'parameter_1': parametr_1,
                    'parameter_2': parametr_2,
                    }
                else:
                    res_wl = int(wl.get(f"get/{res_wcapi['id']}").json()[0]['id_product'])
                    data = {
                    'id_product': res_wcapi['id'],
                    'articul_product' : articul_url,
                    'type': UX,
                    'id_complect': res_wl,
                    'articul_complect' : part,
                    'complectation': ','.join(complectation),
                    'manufacturer': manufacturer,
                    'parametr_1': parametr_1,
                    'parametr_2': parametr_2,
                    }
                wl.post('post', data).json()
                break
            else:
                time.sleep(30)
        except JSONDecodeError:
            time.sleep(60)

print("ready")
