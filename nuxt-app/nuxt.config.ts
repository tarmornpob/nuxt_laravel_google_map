// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
app: {
    head: {
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      link: [
        {
          rel: 'stylesheet',
          href: 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
          integrity: 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC',
          crossorigin: 'anonymous'
        },
        {
          rel: 'stylesheet',
          href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
          integrity: 'sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==',
          crossorigin: 'anonymous'
        },
        {
          rel:'stylesheet',
          href:'https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&display=swap'
        }
      ],
    }
  },
  css: [
      '~/assets/css/custom.css'
    ],
})
